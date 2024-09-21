<?php

namespace App\Http\Controllers;

use App\Models\vote;
use App\Models\party;
use App\Models\party_candidate;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if(session('nicNo')){
            return view('voting.party1', ['parties' => $party]);
        }else{
            return redirect('/');
        } 
    }

    public function candidate1($id)
    {
        $party_candidate = party_candidate::join('candidates','party_candidates.candidate_id','=','candidates.id')
        ->where('party_candidates.party_id', $id)->get();
        if(session('nicNo')){
            return view('voting.candidate1', ['party_candidates' => $party_candidate]);
        }else{
            return redirect('/');
        }        
    }


    public function store(Request $request)
    {
        // Extract party ID from the request
        $partyId = $request->input('party_id');
        $nicNo = $request->input('nicNo');

        // Extract candidate IDs from the request
        $candidateIds = $request->input('selected_candidates');

        $candidateColumns = [];
        for ($i = 1; $i <= 3; $i++) {
            // Check if the candidate exists in the current position
            if (isset($candidateIds[$i - 1])) {
                $columnName = 'candidate_no' . $i;
                $candidateColumns[$columnName] = $candidateIds[$i - 1];
            }
        }

        // Add party ID to the array
        $candidateColumns['party_no'] = $partyId;
        $candidateColumns['citizen_nic'] = $nicNo;

        // Create the vote record with candidate columns
        vote::create($candidateColumns);

        session()->forget('nicNo');

        return response()->json([
            'status' => 200,
            'message' => 'Votes submitted successfully',
            'data' => $request->all(),
        ]);
    }

    public function partyVoteCount()
    {
        $parties = Vote::select('parties.id as id', 'parties.name as name','parties.image as image', \DB::raw('COUNT(votes.id) as vote_count'))
            ->join('parties', 'votes.party_no', '=', 'parties.id')
            ->groupBy('parties.id', 'parties.name','parties.image')
            ->get();


        if(session('admin')){
            return view('voteCounts.partyVoteCounts', ['parties' => $parties]);
        }else{
            return redirect('/');
        }       
    }

    public function candidateVoteCount()
    {
        $candidates = DB::select("
                    SELECT
                        candidates.id AS id,
                        candidates.name AS name,
                        candidates.image AS image,
                        COUNT(*) AS vote_count
                    FROM
                        (
                            SELECT
                                candidate_no1 AS id,
                                candidates.name AS name,
                                candidates.image AS image
                            FROM
                                votes
                                JOIN candidates ON votes.candidate_no1 = candidates.id
                            UNION ALL
                            SELECT
                                candidate_no2,
                                candidates.name,
                                candidates.image
                            FROM
                                votes
                                JOIN candidates ON votes.candidate_no2 = candidates.id
                            UNION ALL
                            SELECT
                                candidate_no3,
                                candidates.name,
                                candidates.image
                            FROM
                                votes
                                JOIN candidates ON votes.candidate_no3 = candidates.id
                        ) AS candidates
                    GROUP BY
                        candidates.id,
                        candidates.name,
                        candidates.image
                ");


        



        if(session('admin')){
            return view('voteCounts.candidateVoteCounts', ['candidates' => $candidates]);
        }else{
            return redirect('/');
        }       
    }

}
