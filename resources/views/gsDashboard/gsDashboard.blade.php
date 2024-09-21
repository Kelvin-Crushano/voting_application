@extends('layouts.gs_layout')
@section('gs_content')
<div class="container-xxl d-flex justify-content-center align-items-center container-p-y" >
    <div class="row">
      <div class="col-lg-12 mb-12 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-center">
                <h2 class="card-title text-primary">Welcome to Voting System, GS. {{Auth::guard('gs_users')->user()->firstName}} {{Auth::guard('gs_users')->user()->lastName}}</h2>
                <h5>You can add citizens from your dashboard</h5>
            </div>
          </div>
        </div>
      </div>
  </div>
  @endsection
