<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImplementationActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Update this to your authorization logic
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|nullable|string',
            'user_id' => 'sometimes|required|exists:users,id',
            'recommendation_id' => 'sometimes|required|exists:recommendations,id',
        ];
    }
}
