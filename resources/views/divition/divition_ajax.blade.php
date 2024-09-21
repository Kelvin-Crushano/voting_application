
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add divition ajax --}}
<script>
    $(function() {

  // add new divition ajax request
  $("#add_divition_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_divition_btn").text('Adding Divition...');
        $.ajax({
          url: '{{ route('divition_store') }}',
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
                title: "Divition Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllDivition();
            }
            $("#add_divition_btn").text('Add Divition');
            $("#add_divition_form")[0].reset(); // Reset the form
            $("#addDivitionModal").modal('hide');

          }
        });
      });



      // fetch all employees ajax request
      fetchAllDivition();

      function fetchAllDivition() {
        $.ajax({
          url: '{{ route('divition_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_divitions").html(response);
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
    url: '{{ route('divition_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editDivitionCode").val(response.code);
      $("#editDivitionName").val(response.name);
      $("#editDivitionDiscription").val(response.description);
      $("#edit_divition_id").val(response.id);
    }
  });
});


       // update employee ajax request
       $("#edit_divition_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_divition_btn").text('Updating...');
    $.ajax({
      url: '{{ route('divition_update') }}',
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
                title: "New Divition details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllDivition();
        }
        $("#edit_divition_btn").text('Update Divition');
        $("#edit_divition_form")[0].reset();
        $("#editDivitionModal").modal('hide');
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
          url: '{{ route('divition_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your divition record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllDivition();
          }
        });
      }
    })
  });

    });
  </script>
