<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

abstract class Lens
{

    private string $column;

    public function __construct(string $column)
    {
        $this->column = $column;
    }

    abstract public function apply(Builder $builder, $data);

    public function column(): string
    {
        return $this->column;
    }
}
