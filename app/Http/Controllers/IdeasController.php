<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    public function index(){
        $posts = Post::with(['comments'])->orderBy('yet', 'desc')->paginate(10);
        return view('ideas.ranking', [
            'posts' => $posts,
            'theme' => '追加した人ランキング'
        ]);
    }

    public function done(){
        $posts = Post::with(['comments'])->orderBy('done', 'desc')->paginate(10);
        return view('ideas.ranking', [
            'posts' => $posts,
            'theme' => '達成した人ランキング'
        ]);
    }
}
