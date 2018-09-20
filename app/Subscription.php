<?php

namespace App;

use App\Notifications\NewCommentInAnPost;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subscribed()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifyPost($comment) {
        $this->user->notify(new NewCommentInAnPost($this->subscribed, $comment));

    }
}
