<?php

namespace App;

use App\Relations\Commentable;
use App\Relations\Likable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Likable, Commentable;

    protected $fillable = ['user_id', 'category_id', 'description', 'image', 'name', 'slug', 'body'];

    protected $with = ['user', 'category'];

    protected $appends = ['path', 'isLiked', 'likesCount', 'commentsCount'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }

    public function path()
    {
        return "/blog/{$this->category->slug}/{$this->id}";
    }

    public function getPathAttribute() {
        return $this->path();
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
