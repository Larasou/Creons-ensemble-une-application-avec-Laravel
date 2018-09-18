<?php

namespace App;

use App\Relations\Likable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Likable;

    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'body', 'ip'];

    protected $with = ['user'];

    protected $appends = ['isLiked', 'likesCount'];


    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
    }

    public function commentable() {
         return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
