@extends('layouts.gs_layout')
@section('gs_content')
<div class="container-fluid">
    <div class="row">
        <div class="my-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="text-gark">Identification of your vote </h3>
                </div>
                <div class="card-body">
                    <form  class="row d-flex justify-content-center" method="GET" action="{{ route('login_user') }}">
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
                                    <button type="submit" class="btn btn-primary mt-3">Confirm identity</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
