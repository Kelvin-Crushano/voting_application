@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">party /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new party modal start --}}
            <div class="modal fade" id="addPartyModal" tabindex="-1" aria-labelledby="partyModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="partyModalLabel">Add New Party</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_party_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addPartyCode">Code</label>
                                        <input type="text" id="addPartyCode" name="code" class="form-control m-2" placeholder="p001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addPartyName">Name</label>
                                        <input type="text" id="addPartyName" name="name" class="form-control m-2" placeholder="jvp" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addPartyDiscription">Description</label>
                                        <input type="text" id="addPartyDiscription" name="description" class="form-control m-2" placeholder="something" required>
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
                                    <button type="submit" class="btn btn-primary" id="add_party_btn">Add Party</button>
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
            <div class="modal fade" id="editPartyModal" tabindex="-1" aria-labelledby="editPartyModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPartyModalLabel">Edit the Party Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_party_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_party_id" name="edit_party_id">
                              <input type="hidden" name="edit_party_image" id="edit_party_image">

                              <div class="row">
                                <div class="col-md-12">
                                    <label for="editPartyCode">Code</label>
                                    <input type="text" id="editPartyCode" name="code" class="form-control m-2" placeholder="p001" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editPartyName">Name</label>
                                    <input type="text" id="editPartyName" name="name" class="form-control m-2" placeholder="jvp" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editPartyCode">Discription</label>
                                    <input type="text" id="editPartyDiscription" name="description" class="form-control m-2" placeholder="something" required>
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
                                    <button type="submit" class="btn btn-primary" id="edit_party_btn">Update</button>
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
                    <h3 class="text-gark">Manage Party Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addPartyModal"><i class="bi-plus-circle me-2"></i> + party</button>
                </div>
                <div class="card-body" id="show_all_partys">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('party.party_ajax')
