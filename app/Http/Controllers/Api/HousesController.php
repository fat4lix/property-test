<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HousesSearch;
use App\Models\House;
use App\Http\Resources\House as HouseResource;
use App\Services\Filters\ExactLens;
use App\Services\Filters\PartialLens;
use App\Services\Filters\QueryFilter;
use App\Services\Filters\RangeLens;
use \Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HousesController extends Controller
{
    public function search(HousesSearch $request): AnonymousResourceCollection
    {

        $data = $request->validated();

        $filter = new QueryFilter([
            new PartialLens('name'),
            new ExactLens('bedrooms'),
            new ExactLens('bathrooms'),
            new ExactLens('garages'),
            new ExactLens('storeys'),
            new RangeLens('price')
        ]);

        return HouseResource::collection($filter->apply(House::query(), $data)->get());
    }
}
