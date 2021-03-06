<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'rank', 'name', 'email', 'password', 'avatar', 'token', 'reset',
    ];

    protected $with = ['level'];

    protected $appends = ['path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $token = bcrypt(str_random(60));
            $model->token = str_replace('/', '$', $token);
        });

        self::created(function () {
            User::first()->update([
                'rank' => 5,
                'title' => 'Prof.',
                'name' => 'Larasou',
                'email' => 'soulouf@larasou.com',
                'avatar' => '/images/persons/svg/man-1.svg',
            ]);
        });
    }


    public function setPasswordAttribute($password)
    {
        $this->attributes['password']= \Hash::make($password);
   }

    public function level()
   {
       return $this->belongsTo(Rank::class, 'rank', 'level');
   }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public static function admin()
    {
        return auth()->check() && auth()->user()->rank >= 4;
    }

    public static function modo()
    {
        return auth()->check() && auth()->user()->rank >= 3;
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getRouteKeyName()
    {
        return "name";
    }

    public function path() {
        return "/@{$this->name}";
    }

    public function getPathAttribute() {
        return $this->path();
    }
}
