<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'User',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'mobileNumber' => $this->mobileNumber,
                'isAdmin' => (string)$this->isAdmin
            ]
        ];
    }
}