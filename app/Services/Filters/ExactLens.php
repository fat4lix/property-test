<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class ExactLens extends Lens
{

    public function apply(Builder $builder, $data)
    {
        $value = $data[$this->column()] ?? null;

        if (!is_null($value)) {
            $builder->where($builder->qualifyColumn($this->column()), $value);
        }
    }
}
