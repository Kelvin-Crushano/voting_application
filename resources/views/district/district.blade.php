@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">district /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new district modal start --}}
            <div class="modal fade" id="addDistrictModal" tabindex="-1" aria-labelledby="districtModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="districtModalLabel">Add New District</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_district_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addDistrictCode">Code</label>
                                        <input type="text" id="addDistrictCode" name="code" class="form-control m-2" placeholder="d001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addDistrictName">Name</label>
                                        <input type="text" id="addDistrictName" name="name" class="form-control m-2" placeholder="Colombo" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addDistrictCode">Description</label>
                                        <input type="text" id="addDistrictDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_district_btn">Add district</button>
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
            <div class="modal fade" id="editDistrictModal" tabindex="-1" aria-labelledby="editDistrictModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDistrictModalLabel">Edit the District Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_district_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_district_id" name="district_id">


                              <div class="row">
                                <div class="col-md-12">
                                    <label for="editDistrictCode">Code</label>
                                    <input type="text" id="editDistrictCode" name="code" class="form-control m-2" placeholder="d001" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editDistrictName">Name</label>
                                    <input type="text" id="editDistrictName" name="name" class="form-control m-2" placeholder="Batticaloa" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editDistrictCode">Discription</label>
                                    <input type="text" id="editDistrictDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                </div>

                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_district_btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit district modal end --}}

        <div class="my-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="text-gark">Manage District Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addDistrictModal"><i class="bi-plus-circle me-2"></i> + District</button>
                </div>
                <div class="card-body" id="show_all_districts">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('district.district_ajax')
