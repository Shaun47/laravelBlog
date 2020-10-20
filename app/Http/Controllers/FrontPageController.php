<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontPageController extends Controller
{
    public function index(){
        $posts = Post::with('author')->popular()->published()->take(3)->get();
        $most_recent_post = Post::with('author')->orderBy('published_at','desc')->published()->take(1)->first();
        $recentPosts = Post::with('author')->orderBy('published_at','desc')->published()->where('id','!=',$most_recent_post->id)->take(3)->get();
        $popularPosts = Post::with('author')->popular()->published()->take(4)->get();
        return view('blog.frontPage',compact('posts','most_recent_post','recentPosts','popularPosts'));
    }

   
}
