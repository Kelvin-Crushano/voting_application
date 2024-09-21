@extends('layouts.admin_layout')
@section('content') 

<div class="container-xxl d-flex justify-content-center align-items-center container-p-y" >
    <div class="row">
      <div class="col-lg-12 mb-12 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-center">
                <h2 class="card-title text-primary">Welcome to Voting System, Commissioner. {{Auth::guard('admin')->user()->name}} </h2>
                <h5>You can manage all the details here</h5>
            </div>
          </div>
        </div>
      </div>
  </div>


@endsection
