<?php

namespace App\Http\Filters;



use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';
    public const PRODUCT_NAME = 'name';
    public const ORDER_BY = 'order_by';
    public const USER_ID = 'user_id';

    protected function getCallBacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'category_id'],
            self::PRODUCT_NAME => [$this, 'name'],
            self::ORDER_BY => [$this, 'order_by'],
            self::USER_ID => [$this, 'user_id'],
        ];
    }

    public function category_id(Builder $builder, $value): void
    {
        $builder->where(self::CATEGORY_ID, $value);
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where(self::PRODUCT_NAME, 'like', '%'.$value.'%');
    }

    public function user_id(Builder $builder, $value): void
    {
        $builder->where(self::USER_ID, '=', $value);
    }

    public function order_by(Builder $builder, array $value): void
    {
        foreach ($value as $field => $order) {
            $builder->orderBy($field, $order);
        }
    }
}
