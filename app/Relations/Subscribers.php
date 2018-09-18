<?php


namespace App\Relations;


trait Subscribers
{
    public static function bootLikable() {
        self::deleting(function ($model) {
            $model->subscriptions->each->delete();
        });
    }

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
        $this->subscriptions()
        ->where('user_id', auth()->id())
        ->exists();
    }
}