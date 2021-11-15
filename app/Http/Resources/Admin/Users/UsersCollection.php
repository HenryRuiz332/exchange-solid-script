<?php

namespace App\Http\Resources\Admin\Users;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'data' => $this->collection->transform(function($users){
                return [
                    "id"                                    => $users->id,
                    "country_id"                            => $users->country_id,
                    "state_id"                              => $users->state_id,
                    "city_id"                               => $users->city_id,
                    "status_model_id"                       => $users->status_model_id,
                    "name"                                  => $users->name,
                    "slug"                                  => $users->slug,
                    "last_name"                             => $users->last_name,
                    "date_age"                              => $users->date_age,
                    "document"                              => $users->document,
                    "email"                                 => $users->email,
                    "avatar"                                 => $users->avatar,
                    "phone"                                 => $users->phone,
                    "email_verified_at"                     => $users->email_verified_at,
                  
                    "url"                                   => url()->full()
                ];
            })

        ];
    }
}
