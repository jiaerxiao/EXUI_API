<?php
/*
 * @Author: 贾二小
 * @Date: 2022-07-18 23:22:42
 * @LastEditTime: 2022-07-18 23:23:09
 * @LastEditors: 贾二小
 * @FilePath: /laravel-api/app/Models/Scopes/PaginateConditionScope.php
 */

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PaginateConditionScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->when(request('key'), function ($query, $key) {
            $query->where($key, 'like', "%" . request('content') . "%");
        });
    }
}
