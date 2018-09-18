<?php

namespace App\Relations;


trait Likable
 {

     public static function bootLikable() {
         self::deleting(function ($model) {
             $model->likes->each->delete();
         });
     }

     /**
      * Relation Polymorphique pour liker plusieurs Model.
      *
      * @return \Illuminate\Database\Eloquent\Relations\MorphMany
      */
     public function likes()
     {
         return $this->morphMany('App\Like', 'liked');
     }

     /**
      * Liker un Model.
      *
      * @return Model
      */
     public function like()
     {
         $user = ['user_id' => auth()->id()];

         if (! $this->likes()->where($user)->exists()) {
             return $this->likes()->create($user);
         }
     }


     /**
      * Disliker un Model.
      */
     public function unlike()
     {
         $user = ['user_id' => auth()->id()];

         $this->likes()->where($user)->get()->each->delete();
     }

     /**
      * Savoir si l'utilisateur courant à a "liker" un Model ou non.
      *
      * @return bool
      */
     public function getIsLikedAttribute() {
         return !! $this->likes->where('user_id', auth()->id())->count();
     }


     /**
      * Permet d'affficher le nombre de like.
      *
      * @return mixed
      */
     public function getLikesCountAttribute() {
         return $this->likes->count();
     }
 }