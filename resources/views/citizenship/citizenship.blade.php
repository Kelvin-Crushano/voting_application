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
                                        <label for="addnameWithInitials">Initials</label>
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

                                <input type="hidden" id="divition_id" name="divition_id" class="form-control m-2" value="{{Auth::guard('gs_users')->user()->workingDivition}}" required>

                                <p class="mt-4 text-warning">Contact Details:</p>
                                <hr class="text-secondary mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="addaddressInSrilanka">Address (Sri Lanka)</label>
                                        <input type="text" id="addaddressInSrilanka" name="addressInSrilanka" class="form-control m-2" placeholder="colombo-05" required>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_citizenship_btn">Add citizenship</button>
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
                                        <label for="editnameWithInitials">Initials</label>
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
