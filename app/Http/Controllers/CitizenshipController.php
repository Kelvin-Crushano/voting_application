<?php

namespace App\Http\Controllers;

use App\Models\citizenship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\divition;


class CitizenshipController extends Controller
{
    public function index()
    {
        if(session('gs')){
            return view('citizenship.citizenship');
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $value=5;
            $citizenshipData = [
                'citizenshipNo'=>$value,
                'batch' => $request->batch,
                'nameWithInitials'=> $request->nameWithInitials,
                'fullName'=> $request->fullName,
                'addressInSrilanka'=> $request->addressInSrilanka,
                'contactNo'=> $request->contactNo,
                'dob'=> $request->dob,
                // 'pob'=> $request->pob,
                'birthNo'=> $request->birthNo,
                'district'=> $request->district,
                'nicNo'=> $request->nicNo,
                'sex'=> $request->sex,
                'divition_id'=>$request->divition_id,
                'password'=> Hash::make($request->birthNo),
            ];
            citizenship::create($citizenshipData);
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            // Handle the exception (e.g., log, return an error response)
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(citizenship $citizenship)
    {
        $citizenships = citizenship::all();
        
        $divisions = divition::all();
        $output = '';
        if ($citizenships->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name with Initial</th>
                        <th>Full Name</th>
                        <th>Address In Srilanka</th>
                        <th>Contact No</th>
                        <th>DOB</th>
                        <th>Birth No</th>
                        <th>District</th>
                        <th>NIC</th>
                        <th>Sex</th>
                        <th>Division</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $citizenshipID = 1; // Initialize the leadID

            foreach ($citizenships as $citizenship) {
                $output .= '<tr>
                    <td>' . $citizenshipID . '</td>
                    <td>' . $citizenship->nameWithInitials . '</td>
                    <td>' . $citizenship->fullName . '</td>
                    <td>' . $citizenship->addressInSrilanka . '</td>
                    <td>' . $citizenship->contactNo . '</td>
                    <td>' . $citizenship->dob . '</td>
                    <td>' . $citizenship->birthNo . '</td>
                    <td>' . $citizenship->district . '</td>
                    <td>' . $citizenship->nicNo . '</td>
                    <td>' . $citizenship->sex . '</td>
                    <td>';

                    foreach ($divisions as $division) {
                        if ($division->id == $citizenship->divition_id) {
                            $output .= $division->name;
                            $divisionFound = true;
                            break;
                        }
                    }

                    if (!isset($divisionFound)) {
                        $output .= '<span style="color: red;">None</span>';
                    }
                    $output .= '</td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $citizenship->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editcitizenshipModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $citizenship->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $citizenshipID++;
            }
            $output .= '</tbody></table></div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
		$citizenships = citizenship::find($id);
		return response()->json($citizenships);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, citizenship $citizenship)
    {
        $citizenships= citizenship::find($request->citizenship_id);
        $citizenshipData = [
            'batch' => $request->batch,
            'nameWithInitials'=> $request->nameWithInitials,
            'fullName'=> $request->fullName,
            'addressInSrilanka'=> $request->addressInSrilanka,
            'contactNo'=> $request->contactNo,
            'dob'=> $request->dob,
            'birthNo'=> $request->birthNo,
            'district'=> $request->district,
            'nicNo'=> $request->nicNo,
            'sex'=> $request->sex,
        ];
       $citizenships->update($citizenshipData);
       return response()->json([
           'status' => 200,
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
		$citizenship = citizenship::find($id);
        citizenship::destroy($id);
    }
}
