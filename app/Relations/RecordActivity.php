<?php


namespace App\Relations;


trait RecordActivity
{
    public static function bootRecordActivity() {
        if (auth()->guest()) return;

        static::created(function ($model) {
            $model->recordActivity();
        });

        self::deleting(function ($model) {
            $model->activity->each->delete();
        });
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    public function recordActivity()
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => strtolower(str_replace('App\\', '', get_class($this)))
        ]);
    }

}