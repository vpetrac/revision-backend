<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        // Check if the user has roles and get their names, otherwise default to ['Subjekt']
        $roleNames = $this->roles->isEmpty() ? ['Subjekt'] : $this->getRoleNames()->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            // Assuming 'organizationalUnit' is correctly loaded and you want it in the response
            'organizationalUnit' => $this->whenLoaded('organizationalUnit'),
            // Adjusted to show role names, defaulting to ['Subjekt'] if none are assigned
            'roles' => $roleNames,
        ];
    }
}
