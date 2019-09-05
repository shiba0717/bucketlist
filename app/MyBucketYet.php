<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBucketYet extends Model
{
    protected $table = 'mybucketyet';

    protected $fillable = [
        'user_id',
        'bucket_id',
        'title',
    ];
}
