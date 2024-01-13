<?php

namespace App\Http\Controllers;

use App\Models\province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('province.province');
    }

    public function store(Request $request)
    {

        $provinceData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
        province::create($provinceData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(province $province)
    {
        $provinces = province::all();
        $output = '';
        if ($provinces->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Province Code</th>
                        <th>Province Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $provinceID = 1; // Initialize the leadID

            foreach ($provinces as $province) {
                $output .= '<tr>
                    <td>' . $provinceID . '</td>
                    <td>' . $province->code . '</td>
                    <td>' . $province->name . '</td>
                    <td>' . $province->description . '</td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $province->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editProvinceModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $province->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $provinceID++;
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
		$province = province::find($id);
		return response()->json($province);
    }

    public function update(Request $request, province $province)
    {
        $province= province::find($request->province_id);
        $provinceData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
       $province->update($provinceData);
       return response()->json([
           'status' => 200,
       ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
		$province = province::find($id);
        province::destroy($id);
    }
}
