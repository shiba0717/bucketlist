<?php

namespace App\Http\Controllers;

use App\MyBucketDone;
use App\MyBucketYet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;


class MypageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $buckets_yet = MyBucketYet::where('user_id', $user->id)->get();

        $buckets_done = MyBucketDone::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);

        return view('mypage.index', [

            'user' => $user,
            'buckets_yet' => $buckets_yet,
            'buckets_done' => $buckets_done,
            'posts' => $posts,

        ]);

    }

}