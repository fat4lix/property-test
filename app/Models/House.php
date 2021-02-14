<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class House extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathroom',
        'bathrooms',
        'storeys',
        'garages'
    ];
}
