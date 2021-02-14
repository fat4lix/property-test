<?php


namespace App\Http\Requests\Api;


use Illuminate\Foundation\Http\FormRequest;

class HousesSearch extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['sometimes', 'required'],
            'bedrooms' => ['sometimes', 'required', 'numeric'],
            'bathrooms' => ['sometimes', 'required', 'numeric'],
            'garages' => ['sometimes', 'required', 'numeric'],
            'storeys' => ['sometimes', 'required', 'numeric'],
            'price_from' => ['sometimes', 'required', 'numeric'],
            'price_to' => ['sometimes', 'required', 'numeric'],
        ];
    }
}
