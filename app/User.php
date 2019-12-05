<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, int|null $id)
 * @method static author()
 * @method static findOrFail($id)
 * @method static create(array $array)
 * @method static withCount(array $array)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeAuthor($jquery){
        return $jquery->where('role_id', 2);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function favoritePosts(){
        return $this->belongsToMany(Post::class, 'fav_post_user', 'user_id')->withTimestamps();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
