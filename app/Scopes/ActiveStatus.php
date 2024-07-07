<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveStatus implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (request()->routeIs(
            'api.v1.user.*',
            'api.v1.site.*'
        )) {
            $builder->where('status', '=', 'active');
        }
    }
}
