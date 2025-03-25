<?php

namespace App\Models\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    // filter()
    public function scopeFilter(Builder $builder, FilterInterface $filter){
        return $filter->apply($builder);
    }
}
