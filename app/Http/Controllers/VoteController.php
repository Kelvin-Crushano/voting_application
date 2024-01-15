<?php

namespace App\Http\Controllers;

use App\Models\vote;
use App\Models\party;
use App\Models\party_candidate;
use Illuminate\Http\Request;

use Symfony\Contracts\Service\Attribute\Required;

class VoteController extends Controller
{
    public function index(Request $request)
    {

        return view('voting.voting');
    }
    public function party1(Request $request)
    {
        $party = party::all();
        return view('voting.party1', ['parties' => $party]);

    }
    public function party2(Request $request)
    {

        return view('voting.party2');
    }
    public function party3(Request $request)
    {

        return view('voting.party3');
    }

    public function candidate1($id)
    {
        $party_candidate = party_candidate::where('party_id', $id)->get();
        return view('voting.candidate1', ['party_candidates' => $party_candidate]);

        // return view('voting.candidate1');
    }
    public function candidate2(Request $request)
    {

        return view('voting.candidate2');
    }
    public function candidate3(Request $request)
    {

        return view('voting.candidate3');
    }
    public function store(Request $request)
    {
        $voteData = [
            'citizen_nic' => $request->citizen_nic,
        ];
        vote::create($voteData);
        return response()->json([
            'status' => 200,
        ]);
    }

}
