<?php

namespace App\Http\Controllers;

use App\Models\citizenship;
use Illuminate\Http\Request;


class CitizenshipController extends Controller
{
    public function index()
    {
        return view('citizenship.citizenship');
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
        $value=5;
        $citizenshipData = [
            'citizenshipNo'=>$value,
            'batch' => $request->batch,
            'nameWithInitials'=> $request->nameWithInitials,
            'fullName'=> $request->fullName,
            'addressInSrilanka'=> $request->addressInSrilanka,
            'addressInForeign'=> $request->addressInForeign,
            'email'=> $request->email,
            'contactNo'=> $request->contactNo,
            'dob'=> $request->dob,
            'pob'=> $request->pob,
            'birthNo'=> $request->birthNo,
            'district'=> $request->district,
            'nationality'=> $request->nationality,
            'nicNo'=> $request->nicNo,
            'sex'=> $request->sex,
            'spouseName'=> $request->spouseName,
            'nationalityOfSpouse'=> $request->nationalityOfSpouse,
            'fatherName'=> $request->fatherName,
            'fatherDate_dob'=> $request->fatherDate_dob,
            'fatherDate_pob'=> $request->fatherDate_pob,
            'motherName'=> $request->motherName,
            'motherDate_dob'=> $request->motherDate_dob,
            'motherDate_pob'=> $request->motherDate_pob,
            'fatherCertificateNo'=> $request->fatherCertificateNo,
            'fatherDateofIssue'=> $request->fatherDateofIssue,
            'motherCertificateNo'=> $request->motherCertificateNo,
            'motherDateofIssue'=> $request->motherDateofIssue,
            'passwordNumber'=> $request->passwordNumber,
            'passwordDateIssue'=> $request->passwordDateIssue,
            'passwordPlaceIssue'=> $request->passwordPlaceIssue,
            'country'=> $request->country,
            'dateGranted'=> $request->dateGranted,
        ];
        citizenship::create($citizenshipData);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(citizenship $citizenship)
    {
        $citizenships = citizenship::all();
        $output = '';
        if ($citizenships->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name with Initial</th>
                        <th>Full Name</th>
                        <th>Address In Srilanka</th>
                        <th>Address In Foreign</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>DOB</th>
                        <th>POB</th>
                        <th>Birth No</th>
                        <th>District</th>
                        <th>Nationality</th>
                        <th>NIC</th>
                        <th>Sex</th>
                        <th>Spouse name</th>
                        <th>Nationality Of Spouse</th>
                        <th>Father Name</th>
                        <th>Date Of Father</th>
                        <th>Place Of Father</th>
                        <th>Mother Name</th>
                        <th>Date Of Mother</th>
                        <th>Place Of Mother</th>
                        <th>Father Certificate No</th>
                        <th>Date Of Issue</th>
                        <th>Mother Certificate No</th>
                        <th>Date Of Issue</th>
                        <th>Password No</th>
                        <th>Date Of Issue</th>
                        <th>Place Of Issue</th>
                        <th>Country</th>
                        <th>Date Of Granted</th>
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
                    <td>' . $citizenship->addressInForeign . '</td>
                    <td>' . $citizenship->email . '</td>
                    <td>' . $citizenship->contactNo . '</td>
                    <td>' . $citizenship->dob . '</td>
                    <td>' . $citizenship->pob . '</td>
                    <td>' . $citizenship->birthNo . '</td>
                    <td>' . $citizenship->district . '</td>
                    <td>' . $citizenship->nationality . '</td>
                    <td>' . $citizenship->nicNo . '</td>
                    <td>' . $citizenship->sex . '</td>
                    <td>' . $citizenship->spouseName . '</td>
                    <td>' . $citizenship->nationalityOfSpouse . '</td>
                    <td>' . $citizenship->fatherName . '</td>
                    <td>' . $citizenship->fatherDate_dob . '</td>
                    <td>' . $citizenship->fatherDate_pob . '</td>
                    <td>' . $citizenship->motherName . '</td>
                    <td>' . $citizenship->motherDate_dob . '</td>
                    <td>' . $citizenship->motherDate_pob . '</td>
                    <td>' . $citizenship->fatherCertificateNo . '</td>
                    <td>' . $citizenship->fatherDateofIssue . '</td>
                    <td>' . $citizenship->motherCertificateNo . '</td>
                    <td>' . $citizenship->motherDateofIssue . '</td>
                    <td>' . $citizenship->passwordNumber . '</td>
                    <td>' . $citizenship->passwordDateIssue . '</td>
                    <td>' . $citizenship->passwordPlaceIssue . '</td>
                    <td>' . $citizenship->country . '</td>
                    <td>' . $citizenship->dateGranted . '</td>

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
            'addressInForeign'=> $request->addressInForeign,
            'email'=> $request->email,
            'contactNo'=> $request->contactNo,
            'dob'=> $request->dob,
            'pob'=> $request->pob,
            'birthNo'=> $request->birthNo,
            'district'=> $request->district,
            'nationality'=> $request->nationality,
            'nicNo'=> $request->nicNo,
            'sex'=> $request->sex,
            'spouseName'=> $request->spouseName,
            'nationalityOfSpouse'=> $request->nationalityOfSpouse,
            'fatherName'=> $request->fatherName,
            'fatherDate_dob'=> $request->fatherDate_dob,
            'fatherDate_pob'=> $request->fatherDate_pob,
            'motherName'=> $request->motherName,
            'motherDate_dob'=> $request->motherDate_dob,
            'motherDate_pob'=> $request->motherDate_pob,
            'fatherCertificateNo'=> $request->fatherCertificateNo,
            'fatherDateofIssue'=> $request->fatherDateofIssue,
            'motherCertificateNo'=> $request->motherCertificateNo,
            'motherDateofIssue'=> $request->motherDateofIssue,
            'passwordNumber'=> $request->passwordNumber,
            'passwordDateIssue'=> $request->passwordDateIssue,
            'passwordPlaceIssue'=> $request->passwordPlaceIssue,
            'country'=> $request->country,
            'dateGranted'=> $request->dateGranted,
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
