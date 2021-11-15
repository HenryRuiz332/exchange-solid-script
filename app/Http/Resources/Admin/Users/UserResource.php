<?php

namespace App\Http\Resources\Admin\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"                => $this->id,
            "avatar"            => $this->avatar,
            "status_model_id"   => $this->status_model_id,
            "city_id"           =>  $this->city_id,
            "state_id"          =>  $this->state_id,
            "country_id"        => $this->country_id,
            "name"              => $this->name,
            "slug"              => $this->slug,
            "last_name"         => $this->last_name,
            "username"         => $this->username,
            "date_age"          => $this->date_age,
            "document"          => $this->document,
            "email"             => $this->email,
            "phone"             => $this->phone,
            "email_verified_at" => $this->email_verified_at,
            'status' =>     new UserResource($this->status),
            "url"               => url()->full()
        ];
    }
}
