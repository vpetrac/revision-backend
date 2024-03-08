<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    // List files
    public function index($finding_id)
    {
        $folderPath = 'public/uploads/' . $finding_id;

        // List files from the specified directory
        $files = Storage::files($folderPath);

        $fileUrls = array_map(function ($file) {
            return Storage::url($file);
        }, $files);

        return response()->json([
            'files' => $fileUrls,
        ]);
    }

    // Store new files
    public function store(Request $request, $finding_id)
    {
        if (!$request->has('files')) {
            return response()->json(['error' => 'No files provided'], 400);
        }

        $paths = [];
        foreach ($request->file('files') as $file) {
            $originalFilename = $file->getClientOriginalName();
            $filename = $originalFilename;
            $folderPath = 'public/uploads/' . $finding_id;
            $filePath = $folderPath . '/' . $filename;

            // Check if file exists and adjust filename
            $fileCount = 0;
            while (Storage::exists($filePath)) {
                $fileCount++;
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . "-" . $fileCount . '.' . $file->getClientOriginalExtension();
                $filePath = $folderPath . '/' . $filename;
            }

            // Store the file
            $file->storeAs($folderPath, $filename);
            $paths[] = $filePath;
        }

        return response()->json([
            'message' => 'Files uploaded successfully',
            'paths' => $paths,
        ]);
    }

    // Remove a file
    public function destroy($finding_id, $filename)
    {
        $filePath = 'public/uploads/' . $finding_id . '/' . $filename;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return response()->json(['message' => 'File removed successfully']);
        }

        return response()->json(['error' => 'File not found'], 404);
    }

    public function download($finding_id, $filename)
    {
        // Adjust the path to include the finding_id
        $filePath = public_path('storage/uploads/' . $finding_id . '/' . $filename);

        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Return the file for download
        return response()->download($filePath);
    }
}
