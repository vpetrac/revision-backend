<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationalUnitRequest;
use App\Http\Requests\UpdateOrganizationalUnitRequest;
use App\Models\OrganizationalUnit;

class OrganizationalUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * GET /organizational-units
     */
    public function index()
    {
        $units = OrganizationalUnit::with(['head'])->get();
        return response()->json($units);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * POST /organizational-units
     */
    public function store(StoreOrganizationalUnitRequest $request)
    {
        $unit = OrganizationalUnit::create($request->validated());
        return response()->json($unit, 201);
    }

    /**
     * Display the specified resource.
     * 
     * GET /organizational-units/{id}
     */
    public function show(string $id)
    {
        $unit = OrganizationalUnit::with(['head', 'organization', 'revisions'])->find($id);

        if (!$unit) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        return response()->json($unit);
    }

    /**
     * Update the specified resource in storage.
     * 
     * PUT/PATCH /organizational-units/{id}
     */
    public function update(UpdateOrganizationalUnitRequest $request, string $id)
    {
        $unit = OrganizationalUnit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $unit->update($request->validated());
        return response()->json($unit);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * DELETE /organizational-units/{id}
     */
    public function destroy(string $id)
    {
        $unit = OrganizationalUnit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $unit->delete();
        return response()->json(['message' => 'Organizational unit deleted.'], 204);
    }
}
