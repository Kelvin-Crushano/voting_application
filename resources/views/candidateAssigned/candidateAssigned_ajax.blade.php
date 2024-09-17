
{{-- this in script link --}}
{{-- @include('ajax_script') --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- datatable js --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
 $(function() {

    fetchAllAssigned();
    fetchAllAssignCandidateList() ;
function fetchAllAssigned() {
    $.ajax({
        url: '{{ route('candidate_assign') }}',
        method: 'get',
        success: function (response) {
            $("#table1").DataTable({
                order: [0, 'desc']
            });
        }
    });
}


      function fetchAllAssignCandidateList() {
        $.ajax({
          url: '{{ route('candidate_assign') }}',
          method: 'get',
          success: function(response) {
            $("#table2").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

$("#candidate_aasign_form").submit(function(e) {
    e.preventDefault();

    // Collect selected party values
    var selectedParty = $('select[name="party_id[]"]').map(function() {
        return $(this).val();
    }).get();

    // Check if no party is selected
    if (selectedParty.every(function(party) {return party === "";})) {
        // Show an error message if no party is selected
        Swal.fire(
            'Oops!',
            'Please select at least one Party.',
            'error'
        );
        $('#candidate_aasign_form')[0].reset();
        $("#candidateAssignModal").modal('hide');
    } else {
        // If members are selected, proceed with the form submission using Ajax
        $("#Assign_btn").text('Assigning...'); // Change the button text to "Assigning..."

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {

                // Form submission was successful, show a success message
                Swal.fire({
                    icon: "success",
                    title: "Candidate assigned to Party successfully.",
                    showConfirmButton: false,
                    timer: 1500,

                });

                // Reset the form and hide the modal
                $('#candidate_aasign_form')[0].reset();
                $("#candidateAssignModal").modal('hide');

                // Change the button text to "Assigned"
                $('#Assign_btn').text('Assigned');
                fetchAllAssignCandidateList()

                // You can perform any other actions here
            },
            error: function() {
                // Handle errors if the form submission fails
                Swal.fire(
                    'Error!',
                    'An error occurred while assigning Party.',
                    'error'
                );
                $('#candidate_aasign_form')[0].reset();
                $("#candidateAssignModal").modal('hide');
                fetchAllAssigned();

            }
        });
    }
});

$(document).on('click', '.editIcon', function(e) {
  e.preventDefault();
  let id = $(this).closest('td').data('id');

  $.ajax({
    url: '{{ route('candidate_assign_edit') }}',
    method: 'get',
    data: {
      id: id,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      // Log the response data to the console
      console.log('Response Data:', response);

      // Set the values of the input fields
      $("#edit_party_assign_id").val(response.party_id);
      $("#edit_party_id").val(response.id);
    }
  });
});

// update employee ajax request
$("#edit_party_assign_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_party_assign_btn").text('Updating...');
    $.ajax({
      url: '{{ route('candidate_assign_update') }}',
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
                title: " Candidate re-assigned to Party successfully!",
                showConfirmButton: false,
                timer: 1500
                     });
        }
        $("#edit_party_assign_btn").text('Update member');
        $("#edit_party_assign_form")[0].reset();
        $("#partyUpdateModal").modal('hide');

        fetchAllAssignCandidateList() ;
      }
    });
  });

});

</script>
