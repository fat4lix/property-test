<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class QueryFilter
{
    /**
     * @var Lens[] $lenses
     */
    private array $lenses;

    public function __construct(array $lenses)
    {
        $this->lenses = $lenses;
    }

    public function apply(Builder $builder, $data): Builder {
        foreach ($this->lenses as $lens) {
            $lens->apply($builder, $data);
        }
        return $builder;
    }

}
