<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'description', 'image', 'name', 'slug', 'body'];

    protected $with = ['user', 'category'];

    protected $appends = ['path'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = str_slug($model->name);
        });
        
        self::deleting(function ($model) {
            $model->comments->each->delete();
            
            $model->likes->each->delete();
        });
    }

    public function path()
    {
        return "/blog/{$this->category->slug}/{$this->id}";
    }

    public function getPathAttribute() {
        return $this->path();
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

    public function likes()
    {
        return $this->morphMany('App`Like', 'liked');
    }

    public function like()
    {
        $user = ['user_id' => auth()->id()];

        if (! $this->likes()->where($user)->exists()) {
           return $this->likes()->create($user);
        }
    }

    public function unlike()
    {
        $user = ['user_id' => auth()->id()];

        $this->likes()->where($user)->get()->each->delete();
    }
}
