@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="fw-bold py-3 my-3"><span class="text-muted fw-light">province /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
            {{-- add new province modal start --}}
            <div class="modal fade" id="addProvinceModal" tabindex="-1" aria-labelledby="provinceModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="provinceModalLabel">Add New Province</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="add_province_form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addProvinceCode">Code</label>
                                        <input type="text" id="addProvinceCode" name="code" class="form-control m-2" placeholder="p001" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addProvinceName">Name</label>
                                        <input type="text" id="addProvinceName" name="name" class="form-control m-2" placeholder="western" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="addProvinceDiscription">Description</label>
                                        <input type="text" id="addProvinceDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add_province_btn">Add Province</button>
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
            <div class="modal fade" id="editProvinceModal" tabindex="-1" aria-labelledby="editProvinceModalLabel" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProvinceModalLabel">Edit the Province Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 bg-light">
                            <form action="#" method="POST" id="edit_province_form" enctype="multipart/form-data">

                                  @csrf
                              <input type="hidden" id="edit_province_id" name="province_id">


                              <div class="row">
                                <div class="col-md-12">
                                    <label for="editProvinceCode">Code</label>
                                    <input type="text" id="editProvinceCode" name="code" class="form-control m-2" placeholder="p001" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editProvinceName">Name</label>
                                    <input type="text" id="editProvinceName" name="name" class="form-control m-2" placeholder="north" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="editProvinceCode">Discription</label>
                                    <input type="text" id="editProvinceDiscription" name="description" class="form-control m-2" placeholder="something" required>
                                </div>

                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit_province_btn">Update</button>
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
                    <h3 class="text-gark">Manage Province Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProvinceModal"><i class="bi-plus-circle me-2"></i> + province</button>
                </div>
                <div class="card-body" id="show_all_provinces">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- this is ajax script coding --}}
@include('province.province_ajax')
