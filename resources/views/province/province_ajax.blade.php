
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add province ajax --}}
<script>
    $(function() {

  // add new province ajax request
  $("#add_province_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_province_btn").text('Adding Province...');
        $.ajax({
          url: '{{ route('province_store') }}',
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
                title: "Province Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllProvince();
            }
            $("#add_province_btn").text('Add Province');
            $("#add_province_form")[0].reset(); // Reset the form
            $("#addProvinceModal").modal('hide');

          }
        });
      });



      // fetch all employees ajax request
      fetchAllProvince();

      function fetchAllProvince() {
        $.ajax({
          url: '{{ route('province_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_provinces").html(response);
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
    url: '{{ route('province_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editProvinceCode").val(response.code);
      $("#editProvinceName").val(response.name);
      $("#editProvinceDiscription").val(response.description);
      $("#edit_province_id").val(response.id);
    }
  });
});


       // update employee ajax request
       $("#edit_province_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_province_btn").text('Updating...');
    $.ajax({
      url: '{{ route('province_update') }}',
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
                title: "New Province details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllProvince();
        }
        $("#edit_province_btn").text('Update Province');
        $("#edit_province_form")[0].reset();
        $("#editProvinceModal").modal('hide');
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
          url: '{{ route('province_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your province record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllProvince();
          }
        });
      }
    })
  });

    });
  </script>
