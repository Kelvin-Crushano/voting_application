@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">gs /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new gs modal start --}}
            <div class="modal fade" id="addGsModal" tabindex="-1" aria-labelledby="gsModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gsModalLabel">Add New Gs</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_gs_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addCode">Code</label>
                                        <input type="text" id="addCode" name="code" class="form-control m-2" placeholder="gs001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addFirstName">First Name</label>
                                        <input type="text" id="addFirstName" name="firstName" class="form-control m-2" placeholder="kelvin" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addLastName">Last Name</label>
                                        <input type="text" id="addLastName" name="lastName" class="form-control m-2" placeholder="john" required>
                                    </div>

                                    <div>
                                        <label for="addAddress">Address</label>
                                        <input type="text" id="addAddress" name="address" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>

                                    <div>
                                        <label for="addPhoneNumber">Phone Number</label>
                                        <input type="text" id="addLastName" name="phoneNumber" class="form-control m-2" placeholder="0777123456" required>
                                    </div>

                                    <div>
                                        <label for="addEmail">Email</label>
                                        <input type="text" id="addEmail" name="email" class="form-control m-2" placeholder="kelvin@gmail.com" required>
                                    </div>

                                    <div>
                                        <label for="addPassword">Password</label>
                                        <input type="text" id="addPassword" name="password" class="form-control m-2" placeholder="1234" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="addDiscription">Description</label>
                                        <input type="text" id="addDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addGsDivition">Gs Divition</label>
                                        <input type="text" id="addGsDivition" name="gsDivition" class="form-control m-2" placeholder="sainthamaruthu-01" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image">Select Image</label>
                                        <input type="file" name="image" id="addImage" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <img id="selectedImage" src="#" alt="Selected Image" class="img-fluid img-thumbnail" style=" width:100px;border-radius:7px;display: none;">
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_gs_btn">Add Gs</button>
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
            <div class="modal fade" id="editGsModal" tabindex="-1" aria-labelledby="editGsModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGsModalLabel">Edit the Gs Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_gs_form" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" id="edit_gs_id" name="edit_gs_id">
                                <input type="hidden" name="edit_gs_image" id="edit_gs_image">

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="editCode">Code</label>
                                        <input type="text" id="editCode" name="code" class="form-control m-2" placeholder="gs001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editFirstName">First Name</label>
                                        <input type="text" id="editFirstName" name="firstName" class="form-control m-2" placeholder="kelvin" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editLastName">Last Name</label>
                                        <input type="text" id="editLastName" name="lastName" class="form-control m-2" placeholder="john" required>
                                    </div>

                                    <div>
                                        <label for="editAddress">Address</label>
                                        <input type="text" id="editAddress" name="address" class="form-control m-2" placeholder="batticaloa" required>
                                    </div>

                                    <div>
                                        <label for="editPhoneNumber">Phone Number</label>
                                        <input type="text" id="editPhoneNo" name="phoneNumber" class="form-control m-2" placeholder="0777123456" required>
                                    </div>

                                    <div>
                                        <label for="editEmail">Email</label>
                                        <input type="text" id="editEmail" name="email" class="form-control m-2" placeholder="kelvin@gmail.com" required>
                                    </div>

                                    <div>
                                        <label for="editPassword">Password</label>
                                        <input type="text" id="editPassword" name="password" class="form-control m-2" placeholder="1234" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="editDiscription">Description</label>
                                        <input type="text" id="editDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editGsDivition">Gs Divition</label>
                                        <input type="text" id="editGsDivition" name="gsDivition" class="form-control m-2" placeholder="sainthamaruthu-01" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image">Select Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="mt-2" id="image">

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_gs_btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            {{-- edit gs2 modal start --}}
            <div class="modal fade" id="editGsModal2" tabindex="-1" aria-labelledby="editGsModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGsModalLabel">Add the Gs Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_gs_form2" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" id="edit_gs_id2" name="edit_gs_id2">

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <select class="form-select" aria-label="Default select example" autofocus id="editworkingProvince" name="workingProvince" required>
                                            <option value="" disabled selected>
                                                <---Select province-->
                                            </option>
                                            @foreach($province as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <select class="form-select" aria-label="Default select example" autofocus id="editworkingDistrict" name="workingDistrict" required>
                                            <option value="" disabled selected>
                                                <---Select district-->
                                            </option>
                                            @foreach($distric as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <select class="form-select" aria-label="Default select example" autofocus id="editworkingDivition" name="workingDivition" required>
                                            <option value="" disabled selected>
                                                <---Select divition-->
                                            </option>
                                            @foreach($divition as $divition)
                                            <option value="{{ $divition->id }}">{{ $divition->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_gs_btn2">Add gs</button>
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
                    <h3 class="text-gark">Manage Gs Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addGsModal"><i class="bi-plus-circle me-2"></i> + Gs</button>
                </div>
                <div class="card-body" id="show_all_gs">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('gs.gs_ajax')
