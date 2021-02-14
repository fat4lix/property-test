<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class RangeLens extends Lens
{

    public function apply(Builder $builder, $data)
    {
        $fromColName = $this->column() . '_from';
        $toColName = $this->column() . '_to';

        $from = $data[$fromColName] ?? null;
        $to = $data[$toColName] ?? null;

        $column = $builder->qualifyColumn($this->column());

        if (!is_null($from) && !is_null($to)) {
            $builder->whereBetween($column, [$from, $to]);
            return;
        }

        if (!is_null($from)) {
            $builder->where($column, '>=', $from);
        }

        if (!is_null($to)) {
            $builder->where($column, '<=', $to);
        }

    }
}
