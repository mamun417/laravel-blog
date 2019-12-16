<?php

namespace App;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $all)
 * @method static whereHas(string $string, \Closure $param)
 * @method static where()
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    protected $dispatchesEvents = [
        'saved' => CategoryObserver::class
    ];
}
