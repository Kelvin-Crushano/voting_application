@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <h4 class="fw-bold py-3 my-4"><span class="text-muted fw-light">Party assign list /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
    <div class="row">
        <div class=" mb-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="text-dark">Votes counts per Candidate</h3>
                </div>
                <div class="card-body" id="assign_member">
                    @csrf

                    @php
                    $userId = 1; // Set your starting member_memberID here
                    @endphp

                    <div class="table-responsive">
                        @if (count($candidates) > 0)
                        <table id="table2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Candidate Picture</th>
                                    <th>Candidate Name</th>
                                    <th>Vote Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($candidates as $candidate)
                                <tr>
                                    <td>{{ $candidate->id }}</td>
                                    <td><img src="storage/images/admin_images/{{ $candidate->image }}" width="50" class="rounded-circle"></td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->vote_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No Results Found</p>
                        @endif
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
</div>
@endsection
{{-- this is ajax script coding --}}
@include('candidateAssigned.candidateAssigned_ajax')
