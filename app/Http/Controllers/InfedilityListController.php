<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfedilityListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $revisionId = $request->query('revision_id');

        if ($revisionId) {
            $infidelityLists = \App\Models\InfedilityList::where('revision_id', $revisionId)->get();
        } else {
            $infidelityLists = \App\Models\InfedilityList::all();
        }

        return response()->json($infidelityLists);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infidelityList = new \App\Models\InfedilityList();
        $infidelityList->fill($request->all());
        $infidelityList->save();

        return response()->json($infidelityList, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infidelityList = \App\Models\InfedilityList::find($id);
        if (!$infidelityList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($infidelityList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $infidelityList = \App\Models\InfedilityList::find($id);
        if (!$infidelityList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $infidelityList->fill($request->all());
        $infidelityList->save();

        return response()->json($infidelityList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infidelityList = \App\Models\InfedilityList::find($id);
        if (!$infidelityList) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $infidelityList->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
