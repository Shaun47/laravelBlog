<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::with('author')->orderBy('published_at','desc')->published()->paginate(3);

        return view("blog.index",compact('posts'));
    }



    public function show(Post $post){
        $post->increment('view_count');
        return view('blog.show',compact('post'));
    }



    public function category(Category $category){
        // $posts = Post::with('author')->orderBy('published_at','desc')->where('category_id',$id)->published()->paginate(3);
        
        $posts = $category->posts()->orderBy('published_at','desc')->published()->paginate(3);
        
        $categoryName = $category->title;

        return view("blog.index",compact('posts','categoryName'));
    }

    public function author(User $author){
        $posts = $author->posts()->orderBy('published_at','desc')->published()->paginate(3);

        $authorName = $author->name;
        return view("blog.index",compact('posts','authorName'));
    }
}
