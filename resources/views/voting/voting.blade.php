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
                        <h3 class="text-gark">Identification of your vote </h3>
                    </div>
                    <div class="card-body">
                        <form id="voterLoginForm" class="row d-flex justify-content-center">
                            @csrf
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="mb-2" for="finger">Finger</label>
                                    <input type="text" class="form-control mb-3" id="finger" placeholder="FINGER">
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-2" for="nic">Nic</label>
                                    <input type="text" class="form-control" name="nicNo" id="nic" placeholder="NIC NO" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <button type="submit" id="submitBtn" class="btn btn-primary mt-3">Confirm identity</button>
                                    </div>
                                </div>
    
                            </div>
    
                        </form>
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
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script>
        $(document).ready(function () {
            $('#submitBtn').click(function (e) {
                e.preventDefault();
                var nic = $('#nicNo').val();
                if(nic != "" || nic != undefined){
                    $.ajax({
                        url: '{{ route('login_user') }}',
                        type: 'GET',
                        data: $('#voterLoginForm').serialize(),
                        success: function (response) {
                            if (response.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                                // Redirect if needed
                                if (response.redirect) {
                                    setTimeout(() => {
                                        window.location.href = response.redirect;
                                    }, 500);
                                }
                            }
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                }else{
                    alert("Please enter NIC no")
                }
                
            });
        });
    </script>
  </body>
</html>

