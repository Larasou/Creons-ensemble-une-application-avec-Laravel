<?php

namespace App;

use App\Notifications\NewCommentInAnPost;
use App\Relations\Commentable;
use App\Relations\Likable;
use App\Relations\Subscribers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Likable, Commentable, Subscribers;

    protected $fillable = ['user_id', 'category_id', 'description', 'image', 'name', 'slug', 'body'];

    protected $with = ['user', 'category'];

    protected $appends = [
        'path', 'isLiked', 'likesCount', 'commentsCount', 'isSubscribedTo'
    ];

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

    public function addComment($comment) {
        $comment = $this->comments()->create($comment);

        $this->subscriptions
            ->where('user_id', '!=', $comment->user_id)
            ->each
            ->notifyPost($comment);


        return $comment->load('user');
    }

}
