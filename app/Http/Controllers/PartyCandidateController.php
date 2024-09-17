<?php

namespace App\Http\Controllers;

use App\Models\party_candidate;
use App\Models\party;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartyCandidateController extends Controller
{
    public function index()
    {
        $party = party::all();
        $candidate = candidate::all();
        $party_candidate = party_candidate::all();
        if(session('admin')){
            return view('candidateAssigned.candidateAssigned', ['parties' => $party, 'candidates' => $candidate, 'party_candidates' => $party_candidate]);
        }else{
            return redirect('/');
        }
    }
    public function candidateAssigned_list()
    {
        $party = party::all();
        $candidate = candidate::all();
        $party_candidate = party_candidate::all();
        if(session('admin')){
            return view('candidateAssigned.candidateAssignedList', ['parties' => $party, 'candidates' => $candidate, 'party_candidates' => $party_candidate]);
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'party_id' => 'required|array',
            'candidate_id' => [
                'required',
                'array',
                Rule::unique('party_candidates', 'candidate_id')->where(function ($query) use ($request) {
                    return $query->whereNotIn('party_id', $request->party_id);
                }),
                Rule::unique('party_candidates')->where(function ($query) use ($request) {
                    return $query->whereIn('party_id', $request->party_id);
                }),
            ],
        ]);



        $partyIds = $request->party_id;
        $candidateIds = $request->candidate_id;

        $partyCandidates = [];

        foreach ($partyIds as $partyIds) {
            foreach ($candidateIds as $candidateIds) {
                $partyCandidates[] = [
                    'party_id' => $partyIds,
                    'candidate_id' => $candidateIds,
                    'status' => '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert multiple records at once
        party_candidate::insert($partyCandidates);
        return redirect('/candidate_assign');
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $partyCandidate = party_candidate::find($id);
        return response()->json($partyCandidate);
    }

    public function update(Request $request)
    {

        $partyCandidate = party_candidate::find($request->edit_party_id);
        $partyCandidateData = ['party_id' => $request->party_id];

        $partyCandidate->update($partyCandidateData);
        return response()->json([
            'status' => 200,
        ]);
    }
}
