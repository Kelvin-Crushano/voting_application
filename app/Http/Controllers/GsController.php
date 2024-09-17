<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gs;
use App\Models\province;
use App\Models\distric;
use App\Models\divition;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class GsController extends Controller
{
    public function index()
    {
        $province = province::all();
        $distric = distric::all();
        $divition = divition::all();
        if(session('admin')){
            return view('gs.gs', ['province' => $province, 'distric' => $distric, 'divition' => $divition]);
        }else{
            return redirect('/');
        }

    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/admin_images', $fileName);

        $gsData = [
            'code' => $request->code,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'gsDivition' => $request->gsDivition,
            'image' => $fileName,
            'workingProvince' => null,
            'workingDistrict' => null,
            'workingDivition' => null,
        ];
        gs::create($gsData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(Gs $gsModel)
    {
        $provinces = province::all();
        $districts = distric::all();
        $divisions = divition::all();
        $gs = gs::all();
        $output = '';

        if ($gs->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>GS Division</th>
                        <th>GS Working Province</th>
                        <th>GS Working District</th>
                        <th>GS Working Division</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $gsID = 1; // Initialize the leadID

            foreach ($gs as $gs) {
                $output .= '<tr>
                    <td>' . $gsID . '</td>
                    <td><img src="storage/images/admin_images/' . $gs->image . '" width="50" class="rounded-circle"></td>
                    <td>' . $gs->firstName . '</td>
                    <td>' . $gs->lastName . '</td>
                    <td>' . $gs->address . '</td>
                    <td>' . $gs->phoneNumber . '</td>
                    <td>' . $gs->email . '</td>
                    <td>' . $gs->description . '</td>
                    <td>' . $gs->gsDivition . '</td>
                    <td>';

                    foreach ($provinces as $province) {
                        if ($province->id == $gs->workingProvince) {
                            $output .= $province->name;
                            $provinceFound = true;
                            break; // Exit the loop once a match is found
                        }
                    }
                    if (!isset($provinceFound)) {
                        $output .= '<span style="color: red;">None</span>';
                    }
                    $output .= '</td><td>';

                    foreach ($districts as $district) {
                        if ($district->id == $gs->workingDistrict) {
                            $output .= $district->name;
                            $districtFound = true;
                            break;
                        }
                    }
                    if (!isset($districtFound)) {
                        $output .= '<span style="color: red;">None</span>';
                    }
                    $output .= '</td><td>';

                    foreach ($divisions as $division) {
                        if ($division->id == $gs->workingDivition) {
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
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded text-primary"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="javascript:void(0);" id="' . $gs->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editGsModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                <a href="javascript:void(0);" id="' . $gs->id . '" class="dropdown-item editIcon2" data-bs-toggle="modal" data-bs-target="#editGsModal2"><i class="tf-icons bx bx-layout me-2"></i> Assign</a>
                                <a class="dropdown-item mx-1 deleteIcon" id="' . $gs->id . '" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>';

                // Increment leadID for the next row
                $gsID++;
            }
            $output .= '</tbody></table></div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }


    public function edit(Request $request)
    {
        $id = $request->id;
		$gs = gs::find($id);
		return response()->json($gs);
    }

    public function edit2(Request $request)
    {
        $id = $request->id;
		$gs = gs::find($id);
		return response()->json($gs);
    }

    public function update(Request $request, gs $gs)
    {
        $fileName = '';
		$gs = gs::find($request->edit_gs_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/admin_images/', $fileName);
			if ($gs->image) {
				Storage::delete('public/images/admin_images/' . $gs->image);
			}
		} else {
			$fileName = $request->edit_gs_image;
		}

        $gsData = [
            'code' => $request->code,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => $request->password,
            'description' => $request->description,
            'gsDivition' => $request->gsDivition,
            'image' => $fileName,
        ];
       $gs->update($gsData);
       return response()->json([
           'status' => 200,
       ]);
    }

    public function update2(Request $request, gs $gs)
    {
		$gs = gs::find($request->edit_gs_id2);
        $gsData = [
            'workingProvince' => $request->workingProvince,
            'workingDistrict' => $request->workingDistrict,
            'workingDivition' => $request->workingDivition,
        ];
       $gs->update($gsData);
       return response()->json([
           'status' => 200,
       ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
		$gs = gs::find($id);
        if (Storage::delete('public/images/admin_images/' . $gs->image)) {
            gs::destroy($id);
		}
    }
}
