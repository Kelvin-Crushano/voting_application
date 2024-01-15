<?php

namespace App\Http\Controllers;

use App\Models\vote;
use Illuminate\Http\Request;

use Symfony\Contracts\Service\Attribute\Required;

class VoteController extends Controller
{
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
