@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <h4 class="fw-bold py-3 my-4"><span class="text-muted fw-light">Party assign list /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
    <div class="row">
        <div class=" mb-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="text-dark">Votes counts per Party</h3>
                </div>
                <div class="card-body" id="assign_member">
                    @csrf

                    @php
                    $userId = 1; // Set your starting member_memberID here
                    @endphp

                    <div class="table-responsive">
                        @if (count($parties) > 0)
                        <table id="table2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Party Picture</th>
                                    <th>Party Name</th>
                                    <th>Vote Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parties as $party)
                                <tr>
                                    <td>{{ $party->id }}</td>
                                    <td><img src="storage/images/admin_images/{{ $party->image }}" width="50" class="rounded-circle"></td>
                                    <td>{{ $party->name }}</td>
                                    <td>{{ $party->vote_count }}</td>
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
