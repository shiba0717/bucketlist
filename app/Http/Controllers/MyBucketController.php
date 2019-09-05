<?php

namespace App\Http\Controllers;

use App\MyBucketDone;
use App\MyBucketYet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Post;


class MyBucketController extends Controller
{
    public function add($id){

        $user = Auth::user();
        $bucket = Post::find($id);
        $bucketsyet = new MyBucketYet;
        $bucketsyet->user_id = $user->id;
        $bucketsyet->bucket_id = $bucket->id;
        $bucketsyet->title = $bucket->title;
        $bucket->yet = $bucket->yet + 1;

        $bucketsyet->save();
        $bucket->save();

        return Redirect::back()
            ->with('my_status', __('バケットに追加しました'))
            ;
    }

    public function done($id){
        $user = Auth::user();
        $bucket = Post::find($id);
        $bucketdone = new MyBucketDone;
        $bucketdone->user_id = $user->id;
        $bucketdone->bucket_id = $bucket->id;
        $bucketdone->title = $bucket->title;
        $bucket->done = $bucket->done + 1;
        $bucket->yet = $bucket->yet - 1;
        $bucketsyet = new MyBucketYet;

        $bucketdone->save();
        $bucket->save();
        $bucketsyet::where('bucket_id', $bucket->id)->delete();

        return Redirect::back()
            ->with('my_status', __('バケットを達成しました！'))
            ;




    }


}
