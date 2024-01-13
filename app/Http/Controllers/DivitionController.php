<?php

namespace App\Http\Controllers;

use App\Models\divition;
use Illuminate\Http\Request;

class DivitionController extends Controller
{
    public function index()
    {
        return view('divition.divition');
    }

    public function store(Request $request)
    {

        $divitionData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
        divition::create($divitionData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(divition $divition)
    {
        $divitions = divition::all();
        $output = '';
        if ($divitions->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Divition Code</th>
                        <th>Divition Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $divitionID = 1; // Initialize the leadID

            foreach ($divitions as $divition) {
                $output .= '<tr>
                    <td>' . $divitionID . '</td>
                    <td>' . $divition->code . '</td>
                    <td>' . $divition->name . '</td>
                    <td>' . $divition->description . '</td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $divition->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editDivitionModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $divition->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $divitionID++;
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
		$divition = divition::find($id);
		return response()->json($divition);
    }

    public function update(Request $request, divition $divition)
    {
        $divition= divition::find($request->divition_id);
        $divitionData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
        ];
       $divition->update($divitionData);
       return response()->json([
           'status' => 200,
       ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
		$divition = divition::find($id);
        divition::destroy($id);
    }
}
