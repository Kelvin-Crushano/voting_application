
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- add candidate ajax --}}
<script>
    $(function() {

  // add new candidate ajax request
  $("#add_candidate_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_candidate_btn").text('Adding Candidate...');
        $.ajax({
          url: '{{ route('candidate_store') }}',
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
                title: "Candidate Added Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
               fetchAllCandidate();
            }
            $("#add_candidate_btn").text('Add Candidate');
            $("#add_candidate_form")[0].reset(); // Reset the form
            $("#addCandidateModal").modal('hide');

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
      fetchAllCandidate();

      function fetchAllCandidate() {
        $.ajax({
          url: '{{ route('candidate_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_candidates").html(response);
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
    url: '{{ route('candidate_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      $("#editCandidateCode").val(response.code);
      $("#editCandidateName").val(response.name);
      $("#editCandidatePhoneNo").val(response.phoneNumber);
      $("#editCandidateNic").val(response.nic);
      $("#editCandidateAddress").val(response.address);
      $("#editCandidateDiscription").val(response.description);
      $("#image").html(
            `<img src="storage/images/admin_images/${response.image}" width="100" style="border-radius:7px;" class="img-fluid img-thumbnail">`);
      $("#edit_candidate_id").val(response.id);
      $("#edit_candidate_image").val(response.image);
    }
  });
});


       // update employee ajax request
       $("#edit_candidate_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_candidate_btn").text('Updating...');
    $.ajax({
      url: '{{ route('candidate_update') }}',
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
                title: "New Candidate details Updated Successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllCandidate();
        }
        $("#edit_candidate_btn").text('Update Candidate');
        $("#edit_candidate_form")[0].reset();
        $("#editCandidateModal").modal('hide');
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
          url: '{{ route('candidate_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
                icon: "warning",
                title: "Your candidate record has been deleted!",
                showConfirmButton: false,
                timer: 1500
                     });
                     fetchAllCandidate();
          }
        });
      }
    })
  });

    });
  </script>
