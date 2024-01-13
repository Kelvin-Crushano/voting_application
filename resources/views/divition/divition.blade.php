@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">divition /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new divition modal start --}}
            <div class="modal fade" id="addDivitionModal" tabindex="-1" aria-labelledby="divitionModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="divitionModalLabel">Add New Divition</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_divition_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addDivitionCode">Code</label>
                                        <input type="text" id="addDivitionCode" name="code" class="form-control m-2" placeholder="d001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addDivitionName">Name</label>
                                        <input type="text" id="addDivitionName" name="name" class="form-control m-2" placeholder="kalmunai" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addDivitionDiscription">Description</label>
                                        <input type="text" id="addDivitionDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_divition_btn">Add Divition</button>
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
            <div class="modal fade" id="editDivitionModal" tabindex="-1" aria-labelledby="editDivitionModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDivitionModalLabel">Edit the Divition Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_divition_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_divition_id" name="divition_id">


                              <div class="row">
                                <div class="col-md-12">
                                    <label for="editDivitionCode">Code</label>
                                    <input type="text" id="editDivitionCode" name="code" class="form-control m-2" placeholder="d001" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editDivitionName">Name</label>
                                    <input type="text" id="editDivitionName" name="name" class="form-control m-2" placeholder="kalmunai" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editDivitionCode">Discription</label>
                                    <input type="text" id="editDivitionDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                </div>

                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_divition_btn">Update</button>
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
                    <h3 class="text-gark">Manage Divition Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addDivitionModal"><i class="bi-plus-circle me-2"></i> + divition</button>
                </div>
                <div class="card-body" id="show_all_divitions">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('divition.divition_ajax')
