
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add party ajax --}}
<script>
    $(function() {

  // add new party ajax request
  $("#add_gs_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_gs_btn").text('Adding Gs...');
        $.ajax({
          url: '{{ route('gs_store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire({
                icon: "success",
                title: "GS Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllGs();
            }
            $("#add_gs_btn").text('Add Gs');
            $("#add_gs_form")[0].reset(); // Reset the form
            $("#addGsModal").modal('hide');

          }
        });
      });

// show the image when add
$("#addImage").on("change", function () {
    const input = this;
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            // Update the src attribute of the img tag with the data URL of the selected image
            $("#selectedImage").attr("src", e.target.result);
            $("#selectedImage").show(); // Show the image
        };

        reader.readAsDataURL(input.files[0]);
    }
});


      // fetch all employees ajax request
      fetchAllGs();

      function fetchAllGs() {
        $.ajax({
          url: '{{ route('gs_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_gs").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

// edit
$(document).on('click', '.editIcon', function(e) {
  e.preventDefault();
  let id = $(this).attr('id');
  $.ajax({
    url: '{{ route('gs_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editCode").val(response.code);
      $("#editFirstName").val(response.firstName);
      $("#editLastName").val(response.lastName);
      $("#editAddress").val(response.address);
      $("#editPhoneNo").val(response.phoneNumber);
      $("#editEmail").val(response.email);
      $("#editPassword").val(response.password);
      $("#editPhoneNo").val(response.phoneNumber);
      $("#editGsDivition").val(response.gsDivition);
      $("#editDiscription").val(response.description);
      $("#image").html(
            `<img src="storage/images/admin_images/${response.image}" width="100" style="border-radius:7px;" class="img-fluid img-thumbnail">`);
      $("#edit_gs_id").val(response.id);
      $("#edit_gs_image").val(response.image);
    }
  });
});


       // update employee ajax request
       $("#edit_gs_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_gs_btn").text('Updating...');
    $.ajax({
      url: '{{ route('gs_update') }}',
      method: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        if (response.status == 200) {
          Swal.fire({
                icon: "success",
                title: "New Gs details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllGs();
        }
        $("#edit_gs_btn").text('Update gs');
        $("#edit_gs_form")[0].reset();
        $("#editGsModal").modal('hide');
      }
    });
  });

  // edit
$(document).on('click', '.editIcon2', function(e) {
  e.preventDefault();
  let id = $(this).attr('id');
  $.ajax({
    url: '{{ route('gs_edit2') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editCode").val(response.code);
      $("#editworkingProvince").val(response.workingProvince);
      $("#editworkingDistrict").val(response.workingDistrict);
      $("#editworkingDivition").val(response.workingDivition);
      $("#edit_gs_id2").val(response.id);

    }
  });
});


       // update employee ajax request
       $("#edit_gs_form2").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_gs_btn2").text('Updating...');
    $.ajax({
      url: '{{ route('gs_update2') }}',
      method: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        if (response.status == 200) {
          Swal.fire({
                icon: "success",
                title: "Gs details Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllGs();
        }
        $("#edit_gs_btn2").text('Update gs');
        $("#edit_gs_form2")[0].reset();
        $("#editGsModal2").modal('hide');
      }
    });
  });

    // delete employee ajax request
    $(document).on('click', '.deleteIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    let csrf = '{{ csrf_token() }}';
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '{{ route('gs_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your gs record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllGs();
          }
        });
      }
    })
  });

    });
  </script>
