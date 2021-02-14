<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Http\Resources\House as HouseResource;

class HousesController extends Controller
{
    public function search() {
        return HouseResource::collection(House::all());
    }
}
