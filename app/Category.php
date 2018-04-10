<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'color', 'description'];

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }
}
