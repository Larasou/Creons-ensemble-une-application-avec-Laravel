<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'name', 'slug', 'body'];
    protected $with = ['user', 'category'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = str_slug($model->name);
        });
        
        self::deleting(function ($model) {
            $model->comments->each->delete();
        });
    }

    public function path()
    {
        return "/blog/{$this->category->slug}/{$this->id}";
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable'); 
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
