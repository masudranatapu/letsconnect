<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'author', 'image', 'slug', 'date', 'details', 'tag', 'date'];

}
