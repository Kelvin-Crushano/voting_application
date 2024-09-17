<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        if(session('admin')){
            return view('candidate.candidate');
        }else{
            return redirect('/');
        }
        
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/admin_images', $fileName);

        $candidateData = [
            'code' => $request->code,
            'name'=> $request->name,
            'phoneNumber'=> $request->phoneNumber,
            'nic'=> $request->nic,
            'address'=> $request->address,
            'description'=> $request->description,
            'image' => $fileName,

        ];
        candidate::create($candidateData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(candidate $candidate)
    {
        $candidates = candidate::all();
        $output = '';
        if ($candidates->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Candidate Code</th>
                        <th>Candidate Name</th>
                        <th>Phone Number</th>
                        <th>nic</th>
                        <th>address</th>
                        <th>description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $candidateID = 1; // Initialize the leadID

            foreach ($candidates as $candidate) {
                $output .= '<tr>
                    <td>' . $candidateID . '</td>
                    <td>' . $candidate->code . '</td>
                    <td>' . $candidate->name . '</td>
                    <td>' . $candidate->phoneNumber . '</td>
                    <td>' . $candidate->nic . '</td>
                    <td>' . $candidate->address . '</td>
                    <td>' . $candidate->description . '</td>
                    <td><img src="storage/images/admin_images/' . $candidate->image . '" width="50" class="rounded-circle"></td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $candidate->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editCandidateModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $candidate->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $candidateID++;
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
		$candidate = candidate::find($id);
		return response()->json($candidate);
    }

    public function update(Request $request) {
		$fileName = '';
		$candidate = candidate::find($request->edit_candidate_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/admin_images/', $fileName);
			if ($candidate->image) {
				Storage::delete('public/images/admin_images/' . $candidate->image);
			}
		} else {
			$fileName = $request->edit_candidate_image;
		}

        $candidateData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
            'phoneNumber'=> $request->phoneNumber,
            'nic'=> $request->nic,
            'address'=> $request->address,
            'image' => $fileName,
        ];

		$candidate->update($candidateData);
		return response()->json([
			'status' => 200,
		]);
	}
    


    public function delete(Request $request)
    {
        $id = $request->id;
		$candidate = candidate::find($id);
        if (Storage::delete('public/images/admin_images/' . $candidate->image)) {
            candidate::destroy($id);
		}

    }
}
