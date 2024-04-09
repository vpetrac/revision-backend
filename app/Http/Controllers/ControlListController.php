<?php

namespace App\Http\Controllers;

use App\Models\ControlList;
use Illuminate\Http\Request;

class ControlListController extends Controller
{
    /**
     * Display a listing of the resource.
     * Accepts an optional revision_id to filter the control lists.
     */
    public function index(Request $request)
    {
        $revisionId = $request->query('revision_id');
        
        if ($revisionId) {
            $controlLists = ControlList::where('revision_id', $revisionId)->get();
        } else {
            $controlLists = ControlList::all();
        }

        return response()->json($controlLists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $controlList = new ControlList();
        $controlList->fill($request->all());
        $controlList->save();

        return response()->json($controlList, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $controlList = ControlList::find($id);
        if (!$controlList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($controlList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $controlList = ControlList::find($id);
        if (!$controlList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $controlList->fill($request->all());
        $controlList->save();

        return response()->json($controlList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $controlList = ControlList::find($id);
        if (!$controlList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $controlList->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
