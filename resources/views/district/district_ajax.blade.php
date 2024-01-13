
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add district ajax --}}
<script>
    $(function() {

  // add new district ajax request
  $("#add_district_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_district_btn").text('Adding District...');
        $.ajax({
          url: '{{ route('district_store') }}',
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
                title: "District Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllDistrict();
            }
            $("#add_district_btn").text('Add District');
            $("#add_district_form")[0].reset(); // Reset the form
            $("#addDistrictModal").modal('hide');

          }
        });
      });



      // fetch all employees ajax request
      fetchAllDistrict();

      function fetchAllDistrict() {
        $.ajax({
          url: '{{ route('district_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_districts").html(response);
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
    url: '{{ route('district_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editDistrictCode").val(response.code);
      $("#editDistrictName").val(response.name);
      $("#editDistrictDiscription").val(response.description);
      $("#edit_district_id").val(response.id);
    }
  });
});


       // update employee ajax request
       $("#edit_district_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_district_btn").text('Updating...');
    $.ajax({
      url: '{{ route('district_update') }}',
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
                title: "New District details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllDistrict();
        }
        $("#edit_district_btn").text('Update District');
        $("#edit_district_form")[0].reset();
        $("#editDistrictModal").modal('hide');
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
          url: '{{ route('district_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your District record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllDistrict();
          }
        });
      }
    })
  });

    });
  </script>
