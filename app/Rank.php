<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = ['name', 'slug', 'level'];

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }
}
