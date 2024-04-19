<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    protected $logoPath = 'logos/app-logo.png'; // Define a consistent path for the logo

    public function getLogo()
    {
        if (!Storage::disk('public')->exists($this->logoPath)) {
            return response()->json(['message' => 'No logo found.'], 404);
        }

        $url = Storage::disk('public')->url($this->logoPath);
        return response()->json(['logo_url' => $url]);
    }

    public function setLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required', // Update validation as needed
        ]);

        // Decode Base64 and get image content
        $imageData = explode(',', $request->logo);
        $decodedData = base64_decode($imageData[1]);

        Storage::disk('public')->put($this->logoPath, $decodedData);

        $url = Storage::disk('public')->url($this->logoPath);
        return response()->json(['message' => 'Logo updated successfully.', 'logo_url' => $url]);
    }

    public function deleteLogo()
    {
        if (!Storage::disk('public')->exists($this->logoPath)) {
            return response()->json(['message' => 'No logo to delete.'], 404);
        }

        Storage::disk('public')->delete($this->logoPath);
        return response()->json(['message' => 'Logo deleted successfully.']);
    }
}
