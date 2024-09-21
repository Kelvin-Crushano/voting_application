<?php

namespace App\Http\Controllers;

use App\Models\party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartyController extends Controller
{
    public function index()
    {
        if(session('admin')){
            return view('party.party');
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/admin_images', $fileName);

        $partyData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
            'image' => $fileName,

        ];
        party::create($partyData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function show(party $party)
    {
        $partys = party::all();
        $output = '';
        if ($partys->count() > 0) {
            $output .= '<div class="table-responsive"><table class="table table-hover table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Party Code</th>
                        <th>Party Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
            $partyID = 1; // Initialize the leadID

            foreach ($partys as $party) {
                $output .= '<tr>
                    <td>' . $partyID . '</td>
                    <td>' . $party->code . '</td>
                    <td>' . $party->name . '</td>
                    <td>' . $party->description . '</td>
                    <td><img src="storage/images/admin_images/' . $party->image . '" width="50" class="rounded-circle"></td>

                    <td>
                    <div class="dropdown">
                    <button type="button" class="btn  p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                      <i class="bx bx-dots-vertical-rounded text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a href="javascript:void(0);" id="' . $party->id . '" class="dropdown-item editIcon" data-bs-toggle="modal" data-bs-target="#editPartyModal"><i class="bx bx-edit-alt me-2"></i> Edit</a>

                      <a class="dropdown-item mx-1 deleteIcon" id="' . $party->id . '" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                    </td>

                </tr>';

                // Increment leadID for the next row
                $partyID++;
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
		$party = party::find($id);
		return response()->json($party);
    }

    public function update(Request $request) {
		$fileName = '';
		$party = party::find($request->edit_party_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/admin_images/', $fileName);
			if ($party->image) {
				Storage::delete('public/images/admin_images/' . $party->image);
			}
		} else {
			$fileName = $request->edit_party_image;
		}

        $partyData = [
            'code' => $request->code,
            'name'=> $request->name,
            'description'=> $request->description,
            'image' => $fileName,
        ];

		$party->update($partyData);
		return response()->json([
			'status' => 200,
		]);
	}


    public function delete(Request $request)
    {
        $id = $request->id;
		$party = party::find($id);
        if (Storage::delete('public/images/admin_images/' . $party->image)) {
            party::destroy($id);
		}

    }

}
