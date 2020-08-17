<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\Contact;
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

    public function send(Request $request){
      
        Contact::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'Message'=> $request->Message,
        ]);
        return redirect('/')->with('your message send');
    }


    public function store(Request $request, $id)
    {

       
        $request->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email',
            'content' => 'max:500|min:3',

        ]);
    
        Comment::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'content'=> $request->content,
            'post_id'=>$id,
        ]);

        return back();
    }
}
