<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrganizationalUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Adjust this based on your application's authorization requirements.
        // For now, let's assume any authenticated user can update.
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $organizationalUnitId = $this->route('organizationalUnit');

        return [
            'name' => 'sometimes|required|string|max:255',
            'head_id' => 'sometimes|nullable|integer|exists:users,id',
            'organization_id' => 'sometimes|required|integer|exists:organizations,id',
        ];
    }
}
