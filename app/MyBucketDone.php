<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBucketDone extends Model
{
    protected $table = 'mybucketdone';

    protected $fillable = [
      'user_id',
      'bucket_id',
        'title',
    ];
}
