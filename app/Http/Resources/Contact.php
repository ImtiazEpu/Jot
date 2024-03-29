<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray( $request ) {
        return [
            'data'  => [
                'contact_id'   => $this->id,
                'name'         => $this->name,
                'phone'        => $this->phone,
                'email'        => $this->email,
                'birthday'     => $this->birthday->format( 'm/d/Y' ),
                'company'      => $this->company,
                'last_updated' => $this->updated_at->diffForHumans(),
            ],
            'links' => [
                'self' => $this->path(),
            ]

        ];
    }
}
