@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <h4 class="fw-bold py-3 my-4"><span class="text-muted fw-light">Party assign list /</span> <a href=" {{ route('admin_dashboard') }}">Home</a></h4>
    <div class="row">
        <div class=" mb-4 col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="text-dark">List of Assigned Details</h3>
                </div>
                <div class="card-body" id="assign_member">
                    @csrf

                    @php
                    $userId = 1; // Set your starting member_memberID here
                    @endphp

                    <div class="table-responsive">
                        @if (count($party_candidates) > 0)
                        <table id="table2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Candidate Picture</th>
                                    <th>Candidate Code</th>
                                    <th>Candidate Name</th>
                                    <th>Phone No</th>
                                    <th>Nic</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Party Name</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($party_candidates as $partyCandidate)
                                <tr>
                                    <td>{{ $userId++ }}</td>
                                    @foreach ($candidates as $candidate)
                                    @if ($candidate->id == $partyCandidate->candidate_id)
                                    <td><img src="storage/images/admin_images/{{ $candidate->image }}" width="50" class="rounded-circle"></td>
                                    <td>{{ $candidate->code }}</td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->phoneNumber }}</td>
                                    <td>{{ $candidate->nic }}</td>
                                    <td>{{ $candidate->address }}</td>
                                    <td>{{ $candidate->description }}</td>

                                    @endif
                                    @endforeach

                                    @foreach ($parties as $party)
                                    @if ($party->id == $partyCandidate->party_id)
                                    <td>{{ $party->name }}</td>

                                    @endif
                                    @endforeach

                                    <td>{{ $partyCandidate->created_at }}</td>


                                    <td data-bs-toggle="modal" data-bs-target="#partyUpdateModal" data-id="{{ $partyCandidate->id}}">
                                        <a href="#" class=" mx-1 text-primary editIcon"><i style="font-size: 22px" class="bx bx-edit-alt"></i></a>
                                    </td>


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
            <!-- Modal update -->
            <div class="modal fade" id="partyUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change the party to assign</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" id="edit_party_assign_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="edit_party_id" name="edit_party_id">
                                <div class="form-group">

                                    <select class="form-select" aria-label="Default select example" autofocus id="edit_party_assign_id" name="party_id">
                                        <option value="" disabled selected>
                                            <---Select party-->
                                        </option>
                                        @foreach($parties as $party)
                                        <option value="{{ $party->id }}">{{ $party->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="edit_party_assign_btn" class="btn btn-success">Re-update status</button>
                                </div>
                            </form>
                        </div>
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
