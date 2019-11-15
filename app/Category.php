<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status'];
}
