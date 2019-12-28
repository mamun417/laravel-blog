<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Comment extends Model
{
    /**
     * Get the owning commentable model.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    /*public function post(){
        return $this->morphOne('App\Post','commentable');
    }*/

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mentionedUser(){
        return $this->belongsTo(User::class, 'mentioned_id');
    }
}
