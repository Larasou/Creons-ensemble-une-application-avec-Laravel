<?php


namespace App\Relations;


trait Subscribers
{
    public static function bootSubscribe() {
        self::deleting(function ($model) {
            $model->subscriptions->each->delete();
        });
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function subscriptions()
    {
        return $this->morphMany('App\Subscription', 'subscribed');
    }

    public function subscribe() {
        $this->subscriptions()->create([
            'user_id' => auth()->id()
        ]);
    }

    public function unsubscribe() {
        $this->subscriptions()
        ->where('user_id', auth()->id())
        ->delete();
    }

    public function getIsSubscribedToAttribute() {
        return $this->subscriptions()
        ->where('user_id', auth()->id())
        ->exists();
    }
}