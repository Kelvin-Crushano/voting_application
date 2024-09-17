
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add employee ajax --}}
<script>
    $(function() {

  // add new employee ajax request
  $("#add_citizenship_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_citizenship_btn").text('Adding Citizenship...');
        $.ajax({
          url: '{{ route('citizenship_store') }}',
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
                title: "Citizenship Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
              fetchAllCitizenship();
            }
            $("#add_citizenship_btn").text('Add Batch');
            $("#add_citizenship_form")[0].reset(); // Reset the form
            $("#addCitizenshipModal").modal('hide');
            console.log(response);
          }
        });
      });



      // fetch all employees ajax request
      fetchAllCitizenship();

      function fetchAllCitizenship() {
        $.ajax({
          url: '{{ route('citizenship_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_citizenship").html(response);
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
    url: '{{ route('citizenship_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editnameWithInitials").val(response.nameWithInitials);
      $("#editfullName").val(response.fullName);
      $("#editaddressInSrilanka").val(response.addressInSrilanka);
      $("#editcontactNo").val(response.contactNo);
      $("#editdob").val(response.dob);
      $("#editbirthNo").val(response.birthNo);
      $("#editdistrict").val(response.district);
      $("#editnicNo").val(response.nicNo);
      $("#editsex").val(response.sex);
      $("#editcountry").val(response.country);
      $("#edit_citizenship_id").val(response.id);
    }
  });
});


       // update employee ajax request
       $("#edit_citizenship_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_citizenship_btn").text('Updating...');
    $.ajax({
      url: '{{ route('citizenship_update') }}',
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
                title: "New Citizenship details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllCitizenship();
        }
        $("#edit_citizenship_btn").text('Update Citizenship');
        $("#edit_citizenship_form")[0].reset();
        $("#editcitizenshipModal").modal('hide');
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
          url: '{{ route('citizenship_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your citizenship record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllCitizenship();
          }
        });
      }
    })
  });

    });
  </script>
