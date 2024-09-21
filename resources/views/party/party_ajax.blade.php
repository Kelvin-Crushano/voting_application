
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
  $("#add_party_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_party_btn").text('Adding Party...');
        $.ajax({
          url: '{{ route('party_store') }}',
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
                title: "Party Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllParty();
            }
            $("#add_party_btn").text('Add Party');
            $("#add_party_form")[0].reset(); // Reset the form
            $("#addPartyModal").modal('hide');

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
      fetchAllParty();

      function fetchAllParty() {
        $.ajax({
          url: '{{ route('party_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_partys").html(response);
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
    url: '{{ route('party_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editPartyCode").val(response.code);
      $("#editPartyName").val(response.name);
      $("#editPartyDiscription").val(response.description);
      $("#image").html(
            `<img src="storage/images/admin_images/${response.image}" width="100" style="border-radius:7px;" class="img-fluid img-thumbnail">`);
      $("#edit_party_id").val(response.id);
      $("#edit_party_image").val(response.image);
    }
  });
});


       // update employee ajax request
       $("#edit_party_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_party_btn").text('Updating...');
    $.ajax({
      url: '{{ route('party_update') }}',
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
                title: "New Party details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllParty();
        }
        $("#edit_party_btn").text('Update Party');
        $("#edit_party_form")[0].reset();
        $("#editPartyModal").modal('hide');
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
          url: '{{ route('party_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your party record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllParty();
          }
        });
      }
    })
  });

    });
  </script>
