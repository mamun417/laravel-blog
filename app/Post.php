<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $all)
 */
class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'image', 'body', 'status', 'is_approved'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function favoriteUsers(){
        return $this->belongsToMany(User::class, 'fav_post_user', 'post_id')->withTimestamps();
    }
}
