<?php

namespace App\Http\Filters;



use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';

    protected function getCallBacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'category_id']
        ];
    }

    public function category_id(Builder $builder, $value)
    {
        $builder->where(self::CATEGORY_ID, $value);
    }


}
