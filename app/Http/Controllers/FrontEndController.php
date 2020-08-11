<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use \Illuminate\Support\Str;

class FrontEndController extends Controller
{
    public function index(){
        $posts =Post::paginate(6);
        return view('home')->with('posts',$posts);

    }

    public function show($id){
        return view('post')->with('post',Post::find($id));
        
    }



    public function categoryposts($id)
    {
        $category = Category::findOrFail($id);
        $categoryname = $category->name;

        $posts = $category->posts;
        return view('categories', [
            'posts' => $posts,
            'categoryname' => $categoryname,

        ]);
    }



    public function tagposts($id)
    {
        $tag = Tag::findOrFail($id);
        $post = $tag->posts;
        $tagname = $tag->name;
        return view('tags')->with([
            'posts' => $post,
            'tagname' => $tagname
        ]);
    } 
}
