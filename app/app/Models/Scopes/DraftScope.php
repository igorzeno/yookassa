<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class DraftScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
//        if(false) {
//            $builder;
//        }
        $builder->where('draft', false);
    }
}
