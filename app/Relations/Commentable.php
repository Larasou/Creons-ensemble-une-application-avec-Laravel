<?php


namespace App\Relations;


trait Commentable
{
    public static function bootCommentable() {
        self::deleting(function ($model) {
            $model->comments->each->delete();
        });
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Permet d'affficher le nombre de commentaire.
     *
     * @return mixed
     */
    public function getCommentsCountAttribute() {
        return $this->comments->count();
    }
}