
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Voting system</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->
    <div class="container-fluid">
      <div class="row">
          <div class="my-4 col-sm-12 col-md-12">
              <div class="card shadow">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h3 class="text-gark">Select Candidates </h3>
                      <p>{{session('nicNo')}}</p>
                  </div>  
                  <div class="row">
              @if (count($party_candidates) > 0)  
              <form method="post" id='votingForm' onsubmit="submitForm(event)">
                @csrf
                <div class="row">  
                      @foreach($party_candidates as $party_candidate)                      
                      <div class="col-sm-4 mb-3 mb-sm-0">  
                        <div class="card m-3">  
                          <img src="/storage/images/admin_images/{{ $party_candidate->image }}" alt="" width="50"  class="card-img-top" />
                          <div class="card-body">
                            <h5 class="card-title">{{$party_candidate->name}}</h5>
                            <input type="hidden" class="party-id" id="party_id" value="{{$party_candidate->party_id}}" name="party_id">
                            <input type="hidden"  id="nicNo" value="{{session('nicNo')}}" name="nicNo">
                            <input type="checkbox" name="selected_candidates[]" value="{{ $party_candidate->candidate_id }}" class="form-check-input">
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
  
                    <div class="p-2 d-flex  justify-content-end">
                      <button type="submit" class="btn btn-primary">Submit Votes</button>
                    </div>
              </form>
              @else
              <p>No Results Found</p>
              @endif
  
                    </div>
              </div>
          </div>
      </div>
  </div>
    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>

  
  
  <script>
    function submitForm(e) {
      e.preventDefault();
  
      // Add your validation logic here if needed
  
      var checkboxes = document.getElementsByName('selected_candidates[]');
      var checkedCount = 0;
  
      for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].checked) {
              checkedCount++;
          }
      }
  
      if (checkedCount === 0) {
          alert('Please select at least 1 candidate.');
      } else if (checkedCount > 3) {
          alert('Please select at most 3 candidates.');
      } else {
          // If validation passes, submit the form via AJAX
          $.ajax({
              type: 'POST',
              url: '{{ route('vote_store') }}',
              data: $('#votingForm').serialize(), // Serialize form data
              success: function(response) {
                  // Handle success response if needed
                  if (response.status == 200) {
                    Swal.fire({
                      icon: "success",
                      title: "Voted Successfully!",
                      showConfirmButton: false,
                      timer: 1000,
                    });
                    setTimeout(() => {
                      window.location.href = '/';
                    }, 2000);
                  }
                  console.log(response);
              },
              error: function(error) {
                  // Handle error response if needed
                  console.error(error);
              }
          });
      }
  
        
    }
  </script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>






