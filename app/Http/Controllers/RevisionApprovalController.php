<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\RevisionApproval;
use Illuminate\Http\Request;

class RevisionApprovalController extends Controller
{
    public function index(Request $request)
    {
        $revisionId = $request->input('revision_id');
        $revisionApproval = RevisionApproval::where('revision_id', $revisionId)->firstOrFail();
        return response()->json($revisionApproval);
    }

    public function store($id, Request $request)
    {
        $existingApproval = RevisionApproval::where('revision_id', $id)->first();

        if ($existingApproval) {
            return response()->json(['message' => 'Revision already has an approval record.'], 409); // Conflict
        }

        $approval = RevisionApproval::create($request->all());
        return response()->json($approval, 201); // Created
    }

    public function show($id)
    {
        $revisionApproval = RevisionApproval::where('revision_id', $id)->firstOrFail();
        return response()->json($revisionApproval);
    }

    public function update(Request $request, $id)
    {
        $revisionApproval = RevisionApproval::where('revision_id', $id)->firstOrFail();
        $revisionApproval->update($request->all());
        return response()->json($revisionApproval);
    }

    public function destroy($id)
    {
        $revisionApproval = RevisionApproval::where('revision_id', $id)->firstOrFail();
        $revisionApproval->delete();
        return response()->json(null, 204); // No Content
    }
}
