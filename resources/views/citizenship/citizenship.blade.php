@extends('layouts.gs_layout')
@section('gs_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">batch /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4> {{-- add new member modal start --}}
            {{-- add new citizenship modal start --}}
            <div class="modal fade" id="addCitizenshipModal" tabindex="-1" aria-labelledby="citizenshipModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="citizenshipModalLabel">Add New Citizenship</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_citizenship_form" enctype="multipart/form-data">
                                @csrf
                                <p class="text-warning">Applicant's Name:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="addnameWithInitials">Name with initials</label>
                                        <select id="addnameWithInitials" name="nameWithInitials" class="form-control m-2" required>
                                            <option value="" disabled selected>Name with initials</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Ms">Ms</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="addfullName">Full Name</label>
                                        <input type="text" id="addfullName" name="fullName" class="form-control m-2" placeholder="jack thousan" required>
                                    </div>
                                </div>

                                <p class="mt-4 text-warning">Contact Details:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addaddressInSrilanka">Address (Sri Lanka)</label>
                                        <input type="text" id="addaddressInSrilanka" name="addressInSrilanka" class="form-control m-2" placeholder="colombo-05" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addaddressInForeign">Address (Foreign)</label>
                                        <input type="text" id="addaddressInForeign" name="addressInForeign" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addemail">Email</label>
                                        <input type="text" id="addemail" name="email" class="form-control m-2" placeholder="john@gmail.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addcontactNo">Contact</label>
                                        <input type="text" id="addcontactNo" name="contactNo" class="form-control m-2" placeholder="0777123456" required>
                                    </div>
                                </div>
                                <p class="mt-4 text-warning">Particulars relating to birth:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="adddob">Date of birth</label>
                                        <input type="date" id="adddob" name="dob" class="form-control m-2" placeholder="colombo-05" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addpob">Place of birth</label>
                                        <input type="text" id="addpob" name="pob" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="addbirthNo">Birth No</label>
                                        <input type="text" id="addbirthNo" name="birthNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="adddistrict">District</label>
                                        <select id="adddistrict" name="district" class="form-control m-2" placeholder="colombo" required>
                                            <option value="" disabled selected>Select district</option>
                                            <option value="Colombo">Colombo</option>
                                            <option value="Gampaha">Gampaha</option>
                                            <option value="Kalutara">Kalutara</option>
                                            <option value="Kandy">Kandy</option>
                                            <option value="Matale">Matale</option>
                                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                                            <option value="Galle">Galle</option>
                                            <option value="Matara">Matara</option>
                                            <option value="Hambantota">Hambantota</option>
                                            <option value="Jaffna">Jaffna</option>
                                            <option value="Kilinochchi">Kilinochchi</option>
                                            <option value="Mannar">Mannar</option>
                                            <option value="Vavuniya">Vavuniya</option>
                                            <option value="Mullaitivu">Mullaitivu</option>
                                            <option value="Batticaloa">Batticaloa</option>
                                            <option value="Ampara">Ampara</option>
                                            <option value="Trincomalee">Trincomalee</option>
                                            <option value="Kurunegala">Kurunegala</option>
                                            <option value="Puttalam">Puttalam</option>
                                            <option value="Anuradhapura">Anuradhapura</option>
                                            <option value="Polonnaruwa">Polonnaruwa</option>
                                            <option value="Badulla">Badulla</option>
                                            <option value="Monaragala">Monaragala</option>
                                            <option value="Ratnapura">Ratnapura</option>
                                            <option value="Kegalle">Kegalle</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="addnationality">Nationality</label>
                                        <input type="text" id="addnationality" name="nationality" class="form-control m-2" placeholder="srilanken" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addnicNo">NIC (if available)</label>
                                        <input type="text" id="addnicNo" name="nicNo" class="form-control m-2" placeholder="12345678v" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addsex">Gender</label>
                                        <select id="addsex" name="sex" class="form-control m-2" placeholder="male" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="mt-4 text-warning">If married:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addspouseName">Spouse's Name</label>
                                        <input type="text" id="addspouseName" name="spouseName" class="form-control m-2" placeholder="john" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addnationalityOfSpouse">Nationality of the Spouse</label>
                                        <input type="text" id="addnationalityOfSpouse" name="nationalityOfSpouse" class="form-control m-2" placeholder="canadian" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details of applicant's parents:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="addfatherName">Father's Name</label>
                                        <input type="text" id="addfatherName" name="fatherName" class="form-control m-2" placeholder="jack" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addfatherDate_bod">Date of birth</label>
                                        <input type="date" id="addfatherDate_bod" name="fatherDate_dob" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addfatherDate_pob">Date of place</label>
                                        <input type="text" id="addfatherDate_pob" name="fatherDate_pob" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="addmotherName">Mother's Name</label>
                                        <input type="text" id="addmotherName" name="motherName" class="form-control m-2" placeholder="rose" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addmotherDate_dob">Date of birth</label>
                                        <input type="date" id="addmotherDate_dob" name="motherDate_dob" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addmotherDate_pob">Date of place</label>
                                        <input type="text" id="addmotherDate_pob" name="motherDate_pob" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">If applicant's parents are citizens of sri lanka by registration:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addfatherCertificateNo">Father certification No</label>
                                        <input type="text" id="addfatherCertificateNo" name="fatherCertificateNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addfatherDateofIssue">Date of Issue </label>
                                        <input type="date" id="addfatherDateofIssue" name="fatherDateofIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addmotherCertificateNo">Mother certification No</label>
                                        <input type="text" id="addmotherCertificateNo" name="motherCertificateNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="addmotherDateofIssue">Date of Issue </label>
                                        <input type="date" id="addmotherDateofIssue" name="motherDateofIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details relating to the applicant's srilankan passport:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="addpasswordNumber">Passport No</label>
                                        <input type="text" id="addpasswordNumber" name="passwordNumber" class="form-control m-2" placeholder="N3456748685" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addpasswordDateIssue">Date of Issue </label>
                                        <input type="date" id="addpasswordDateIssue" name="passwordDateIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="addpasswordPlaceIssue">Place of Issue </label>
                                        <input type="text" id="addpasswordPlaceIssue" name="passwordPlaceIssue" class="form-control m-2" placeholder="colombo" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details relating to the permenent residence status of the applicant:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addcountry">Country Name</label>
                                        <input type="text" id="addcountry" name="country" class="form-control m-2" placeholder="Sri lanka" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="adddateGranted">Date of Granted</label>
                                        <input type="date" id="adddateGranted" name="dateGranted" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_citizenship_btn">Add Batch</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- add new member modal end --}}

        <div class="col-md-12">
            {{-- edit member modal start --}}
            <div class="modal fade" id="editcitizenshipModal" tabindex="-1" aria-labelledby="editcitizenshipModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editcitizenshipModalLabel">Edit the Citizenship Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_citizenship_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_citizenship_id" name="citizenship_id">
                                <p class="text-warning">Applicant's Name:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="editnameWithInitials">Name with initials</label>
                                        <select id="editnameWithInitials" name="nameWithInitials" class="form-control m-2" required>
                                            <option value="" disabled selected>Name with initials</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Ms">Ms</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="editfullName">Full Name</label>
                                        <input type="text" id="editfullName" name="fullName" class="form-control m-2" placeholder="jack thousan" required>
                                    </div>
                                </div>

                                <p class="mt-4 text-warning">Contact Details:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editaddressInSrilanka">Address (Sri Lanka)</label>
                                        <input type="text" id="editaddressInSrilanka" name="addressInSrilanka" class="form-control m-2" placeholder="colombo-05" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editaddressInForeign">Address (Foreign)</label>
                                        <input type="text" id="editaddressInForeign" name="addressInForeign" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editemail">Email</label>
                                        <input type="text" id="editemail" name="email" class="form-control m-2" placeholder="john@gmail.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editcontactNo">Contact</label>
                                        <input type="text" id="editcontactNo" name="contactNo" class="form-control m-2" placeholder="0777123456" required>
                                    </div>
                                </div>
                                <p class="mt-4 text-warning">Particulars relating to birth:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="editdob">Date of birth</label>
                                        <input type="date" id="editdob" name="dob" class="form-control m-2" placeholder="colombo-05" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editpob">Place of birth</label>
                                        <input type="text" id="editpob" name="pob" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="editbirthNo">Birth No</label>
                                        <input type="text" id="editbirthNo" name="birthNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="editdistrict">District</label>
                                        <select id="editdistrict" name="district" class="form-control m-2" placeholder="colombo" required>
                                            <option value="" disabled selected>Select district</option>
                                            <option value="Colombo">Colombo</option>
                                            <option value="Gampaha">Gampaha</option>
                                            <option value="Kalutara">Kalutara</option>
                                            <option value="Kandy">Kandy</option>
                                            <option value="Matale">Matale</option>
                                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                                            <option value="Galle">Galle</option>
                                            <option value="Matara">Matara</option>
                                            <option value="Hambantota">Hambantota</option>
                                            <option value="Jaffna">Jaffna</option>
                                            <option value="Kilinochchi">Kilinochchi</option>
                                            <option value="Mannar">Mannar</option>
                                            <option value="Vavuniya">Vavuniya</option>
                                            <option value="Mullaitivu">Mullaitivu</option>
                                            <option value="Batticaloa">Batticaloa</option>
                                            <option value="Ampara">Ampara</option>
                                            <option value="Trincomalee">Trincomalee</option>
                                            <option value="Kurunegala">Kurunegala</option>
                                            <option value="Puttalam">Puttalam</option>
                                            <option value="Anuradhapura">Anuradhapura</option>
                                            <option value="Polonnaruwa">Polonnaruwa</option>
                                            <option value="Badulla">Badulla</option>
                                            <option value="Monaragala">Monaragala</option>
                                            <option value="Ratnapura">Ratnapura</option>
                                            <option value="Kegalle">Kegalle</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="editnationality">Nationality</label>
                                        <input type="text" id="editnationality" name="nationality" class="form-control m-2" placeholder="srilanken" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editnicNo">NIC (if available)</label>
                                        <input type="text" id="editnicNo" name="nicNo" class="form-control m-2" placeholder="12345678v" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editsex">Gender</label>
                                        <select id="editsex" name="sex" class="form-control m-2" placeholder="male" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="mt-4 text-warning">If married:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editspouseName">Spouse's Name</label>
                                        <input type="text" id="editspouseName" name="spouseName" class="form-control m-2" placeholder="john" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editnationalityOfSpouse">Nationality of the Spouse</label>
                                        <input type="text" id="editnationalityOfSpouse" name="nationalityOfSpouse" class="form-control m-2" placeholder="canadian" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details of applicant's parents:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="editfatherName">Father's Name</label>
                                        <input type="text" id="editfatherName" name="fatherName" class="form-control m-2" placeholder="jack" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editfatherDate_dob">Date of birth</label>
                                        <input type="date" id="editfatherDate_dob" name="fatherDate_dob" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editfatherDate_pob">Date of place</label>
                                        <input type="text" id="editfatherDate_pob" name="fatherDate_pob" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="editmotherName">Mother's Name</label>
                                        <input type="text" id="editmotherName" name="motherName" class="form-control m-2" placeholder="rose" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editmotherDate_dob">Date of birth</label>
                                        <input type="date" id="editmotherDate_dob" name="motherDate_dob" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editmotherDate_pob">Date of place</label>
                                        <input type="text" id="editmotherDate_pob" name="motherDate_pob" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">If applicant's parents are citizens of sri lanka by registration:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editfatherCertificateNo">Father certification No</label>
                                        <input type="text" id="editfatherCertificateNo" name="fatherCertificateNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editfatherDateofIssue">Date of Issue </label>
                                        <input type="date" id="editfatherDateofIssue" name="fatherDateofIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editmotherCertificateNo">Mother certification No</label>
                                        <input type="text" id="editmotherCertificateNo" name="motherCertificateNo" class="form-control m-2" placeholder="1234" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editmotherDateofIssue">Date of Issue </label>
                                        <input type="date" id="editmotherDateofIssue" name="motherDateofIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details relating to the applicant's srilankan passport:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="editpasswordNumber">Passport No</label>
                                        <input type="text" id="editpasswordNumber" name="passwordNumber" class="form-control m-2" placeholder="N3456748685" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editpasswordDateIssue">Date of Issue </label>
                                        <input type="date" id="editpasswordDateIssue" name="passwordDateIssue" class="form-control m-2" placeholder="canada" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editpasswordPlaceIssue">Place of Issue </label>
                                        <input type="text" id="editpasswordPlaceIssue" name="passwordPlaceIssue" class="form-control m-2" placeholder="colombo" required>
                                    </div>

                                </div>
                                <p class="mt-4 text-warning">Details relating to the permenent residence status of the applicant:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editcountry">Country Name</label>
                                        <input type="text" id="editcountry" name="country" class="form-control m-2" placeholder="Sri lanka" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editdateGranted">Date of Granted</label>
                                        <input type="date" id="editdateGranted" name="dateGranted" class="form-control m-2" placeholder="canada" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_citizenship_btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit member modal end --}}

        <div class="my-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="text-gark">Manage Citizenship Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCitizenshipModal"><i class="bi-plus-circle me-2"></i> + Citizen</button>
                </div>
                <div class="card-body" id="show_all_citizenship">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('citizenship.citizenship_ajax')
