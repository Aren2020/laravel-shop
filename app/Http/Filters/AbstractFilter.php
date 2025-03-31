<?php

namespace App\Http\Filters;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    private $queryParams = [];

    public function __construct(array $queryParams){
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallBacks(): array;

    public function apply(Builder $builder): void
    {
        foreach ($this->getCallBacks() as $name => $callback){
            if (isset($this->queryParams[$name])){
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }
}
