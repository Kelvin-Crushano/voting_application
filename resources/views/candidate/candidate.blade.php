@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">candidate /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new candidate modal start --}}
            <div class="modal fade" id="addCandidateModal" tabindex="-1" aria-labelledby="candidateModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="candidateModalLabel">Add New Candidate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_candidate_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addCandidateCode">Code</label>
                                        <input type="text" id="addCandidateCode" name="code" class="form-control m-2" placeholder="c001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addCandidateName">Name</label>
                                        <input type="text" id="addCandidateName" name="name" class="form-control m-2" placeholder="kelvin" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addCandidatePhoneNo">Phone No</label>
                                        <input type="text" id="addCandidatePhoneNo" name="phoneNumber" class="form-control m-2" placeholder="0777123456" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addCandidateNic">Nic</label>
                                        <input type="text" id="addCandidateNic" name="nic" class="form-control m-2" placeholder="12345678v" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addCandidateAddress">Address</label>
                                        <input type="text" id="addCandidateAddress" name="address" class="form-control m-2" placeholder="colombo-02" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addCandidateDiscription">Description</label>
                                        <input type="text" id="addCandidateDiscription" name="description" class="form-control m-2" placeholder="something" required>
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
                                    <button type="submit" class="btn btn-primary" id="add_candidate_btn">Add Candidate</button>
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
            <div class="modal fade" id="editCandidateModal" tabindex="-1" aria-labelledby="editCandidateModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCandidateModalLabel">Edit the Candidate Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_candidate_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_candidate_id" name="edit_candidate_id">
                              <input type="hidden" name="edit_candidate_image" id="edit_candidate_image">

                              <div class="row">
                                <div class="col-md-12">
                                    <label for="editCandidateCode">Code</label>
                                    <input type="text" id="editCandidateCode" name="code" class="form-control m-2" placeholder="c001" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editCandidateName">Name</label>
                                    <input type="text" id="editCandidateName" name="name" class="form-control m-2" placeholder="kelvin" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editCandidatePhoneNo">Phone No</label>
                                    <input type="text" id="editCandidatePhoneNo" name="phoneNumber" class="form-control m-2" placeholder="0777123456" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editCandidateNic">Nic</label>
                                    <input type="text" id="editCandidateNic" name="nic" class="form-control m-2" placeholder="12345678v" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editCandidateAddress">Address</label>
                                    <input type="text" id="editCandidateAddress" name="address" class="form-control m-2" placeholder="colombo-01" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editCandidateCode">Discription</label>
                                    <input type="text" id="editCandidateDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Select Image</label>
                                    <input type="file"  name="image" class=" form-control">
                                </div>

                                <div class="mt-2" id="image">

                                </div>

                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_candidate_btn">Update</button>
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
                    <h3 class="text-gark">Manage Candidate Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCandidateModal"><i class="bi-plus-circle me-2"></i> + candidate</button>
                </div>
                <div class="card-body" id="show_all_candidates">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('candidate.candidate_ajax')
