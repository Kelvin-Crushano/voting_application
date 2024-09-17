<?php

namespace App\Http\Controllers;
use App\Models\distric;


use Illuminate\Http\Request;

class DistricController extends Controller
{
    public function index()
    {
        if(session('admin')){
            return view('district.district');
        }else{
            return redirect('/');
        }
        
    }

    public function store(Request $request)
    {

        $districtData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
        distric::create($districtData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(distric $district)
    {
        $districts = distric::all();
        $output = '';
        if ($districts->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>district Code</th>
                        <th>district Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $districtID = 1; // Initialize the leadID

            foreach ($districts as $district) {
                $output .= '<tr>
                    <td>' . $districtID . '</td>
                    <td>' . $district->code . '</td>
                    <td>' . $district->name . '</td>
                    <td>' . $district->description . '</td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $district->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editdistrictModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $district->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $districtID++;
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
		$district = distric::find($id);
		return response()->json($district);
    }

    public function update(Request $request, distric $district)
    {
        $district= distric::find($request->district_id);
        $districtData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
       $district->update($districtData);
       return response()->json([
           'status' => 200,
       ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
		$district = distric::find($id);
        distric::destroy($id);
    }
}
