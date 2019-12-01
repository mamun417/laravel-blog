<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $all)
 * @method static whereHas(string $string, \Closure $param)
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
