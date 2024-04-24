<?php

namespace App\Http\Controllers;

use App\Models\DocumentField;
use App\Http\Requests\StoreDocumentFieldRequest;
use App\Http\Requests\UpdateDocumentFieldRequest;
use Illuminate\Http\Request;

class DocumentFieldController extends Controller
{
    /**
     * Display a listing of the resource based on revisionId.
     */
    public function index(Request $request, $revisionId)
    {
        $documentField = DocumentField::where('revisionId', $revisionId)->firstOrFail();
        return response()->json($documentField);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentFieldRequest $request)
    {
        $documentField = DocumentField::create($request->validated());
        return response()->json($documentField, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documentField = DocumentField::findOrFail($id);
        return response()->json($documentField);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentFieldRequest $request, string $id)
    {
        $documentField = DocumentField::findOrFail($id);
        $documentField->update($request->validated());
        return response()->json($documentField);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documentField = DocumentField::findOrFail($id);
        $documentField->delete();
        return response()->json(null, 204);
    }
}
