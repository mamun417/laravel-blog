<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'status'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public static function getPosts(){
        return Post::publishedAndActive()->with('user')
            ->withCount(['favoriteUsers', 'comments'])
            ->latest()->get()->toArray();
    }
}
