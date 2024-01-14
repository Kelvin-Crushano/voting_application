@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">

    <h4 class="fw-bold py-3 my-4"><span class="text-muted fw-light">candidateAssign /</span> <a href="{{ route('admin_dashboard') }}">Home</a></h4>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="text-dark">Manage CandidateAssign Details</h3>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#candidateAssignModal"><i class="bi-plus-circle me-2"></i>Assign Candidate</button>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="candidate_aasign_form" action="{{ route('candidate_assign_store') }}" method="POST">
                            @csrf

                            @php
                            $candidateAssignedId = 1; // Set your starting lead_memberID here
                            @endphp

                            <div class="table-responsive">
                                @if (count($candidates) > 0)
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Candidate Picture</th>
                                            <th>Select Candidate</th>
                                            <th>Candidate Code</th>
                                            <th>Status</th>
                                            <th>Phone No</th>
                                            <th>Nic</th>
                                            <th>Address</th>
                                            <th>Description</th>
                                            <th>CreatedAt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($candidates as $candidate)
                                        <tr>
                                            <td>{{ $candidateAssignedId++ }}</td>
                                            <td><img src="storage/images/admin_images/{{ $candidate->image }}" width="50" class="rounded-circle"></td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="candidate_id" name="candidate_id[]" value="{{ $candidate->id }}">
                                                    <label class="form-check-label ms-3" style="pointer-events: none;" for="candidate_id" id="leadLabel">{{ $candidate->name }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $candidate->code }}</td>

                                            @php
                                            $partyCandidateFound = false;
                                            $statusText = 'Not Assigned'; // Default status text
                                            $statusColor = 'red'; // Default status color

                                            foreach ($party_candidates as $party_candidate) {
                                                if ($candidate->id == $party_candidate->candidate_id) {
                                                    $partyCandidateFound = true;
                                                    $status = $party_candidate->status;

                                                    // Set color and text based on the status value
                                                    switch ($status) {
                                                        case '1':
                                                            $statusText = 'Assigned'; // Change to the desired text for status '1'
                                                            $statusColor = 'green';
                                                            break;
                                                        // Add more cases as needed
                                                        default:
                                                            // Handle other cases if necessary
                                                            break;
                                                    }
                                                }
                                            }
                                            @endphp

                                            <td>
                                                <span style="background: {{ $statusColor }}" class="badge text-bg-danger">{{ $statusText }}</span>
                                            </td>

                                            <td>{{ $candidate->phoneNumber }}</td>
                                            <td>{{ $candidate->nic }}</td>
                                            <td>{{ $candidate->address }}</td>
                                            <td>{{ $candidate->description }}</td>
                                            <td>{{ $candidate->created_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <p>No Results Found</p>
                                @endif
                            </div>

                            <!-- Modal add -->
                            <div class="modal fade" id="candidateAssignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Select the user to assign</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select class="form-select" aria-label="Default select example" autofocus id="party_id" name="party_id[]">
                                                    <option value="" disabled selected>
                                                        <---Select party-->
                                                    </option>
                                                    @foreach($parties as $party)
                                                    <option value="{{ $party->id }}">{{ $party->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="Assign_btn" class="btn btn-primary assign-button">Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- this is ajax script coding --}}
@include('candidateAssigned.candidateAssigned_ajax')

<style>
    .back {
        background: rgb(221, 219, 219);
        border-radius: 7px;
        padding: 20px;
    }
</style>
