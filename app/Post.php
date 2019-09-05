<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'yet',
        'done',
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
