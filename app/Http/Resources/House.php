<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class House extends JsonResource {

    public function toArray($request) {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'storeys' => $this->storeys,
            'garages' => $this->garages,
        ];
    }

}