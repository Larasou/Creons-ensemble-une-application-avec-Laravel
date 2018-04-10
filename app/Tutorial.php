<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['user_id', 'category_id', 'name', 'slug', 'body'];
    protected $with = ['user', 'category'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
