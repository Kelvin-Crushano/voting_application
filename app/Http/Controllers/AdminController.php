<?php

namespace App\Http\Controllers;

use App\Models\citizenship;
use App\Models\vote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function login_user(Request $request)
    {

		$citizenships = citizenship::where('nicNo', $request->nicNo)->count();

        if($citizenships > 0)
        {
            $voteUser = vote::where('citizen_nic', $request->nicNo)->count();
            if($voteUser > 0)
            {
                return response()->json(['error' => true,'message' => 'You Already Voted']);
            }
            else
            {                
                session(['nicNo' => $request->nicNo]);
                return response()->json(['message' => 'You are eligible', 'redirect' => '/party1']);
            }
        }
        else
        {
            return response()->json(['error' => true,'message' => 'You are not eligible']);
        }

        
    }
}
