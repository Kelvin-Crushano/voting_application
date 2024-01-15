
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
  $("#add_voting_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_vote_btn").text('Checking vote...');
        $.ajax({
          url: '{{ route('vote_store') }}',
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
                title: "You are eligible for votting!",
                showConfirmButton: false,
                timer: 1500
                     });
            }
            $("#add_vote_btn").text('Checking');
            $("#add_voting_form")[0].reset(); // Reset the form
            $("#votingModal").modal('hide');

          }
        });
      });

  });

  
  </script>
