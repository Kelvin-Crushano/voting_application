@extends('layouts.gs_layout')
@section('gs_content')
<div class="container-fluid">
    <div class="row">
        <div class="my-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="text-gark">Select Party </h3>
                </div>

                <div class="row">
                    @if (count($party_candidates) > 0)

                    @foreach($party_candidates as $party_candidate)
                    <div class="col-sm-4 mb-3 mb-sm-0">

                      <div class="card m-3">

                        <img src="storage/images/admin_images/{{ $party_candidate->image }}" alt="" class="card-img-top" />
                        <div class="card-body">
                          <h5 class="card-title">{{$party_candidate->name}}</h5>
                          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                          <a href="#" class="btn btn-primary">Select Candidate</a>
                        </div>
                      </div>
                    </div>


                    @endforeach

            @else
            <p>No Results Found</p>
            @endif

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection


