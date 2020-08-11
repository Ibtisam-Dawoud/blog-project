<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $posts =Post::join('categories','categories_id','=' ,'posts.categories_id')
        ->select([
           'posts.*',
           'categories.name as category_name' 
        ])
        ->paginate(2);*/

         $posts =Post::paginate(6);
       // return view('admin.posts')->with('posts',$posts);
       return view('admin.posts.index')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      //  return view('admin/createPost')->with("tags",Tag::get(['id','name']));


        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 ||   $tags->count() == 0)
        {
          //  Session::flash('info' , 'You must have some categories and tags before attempting to create a post.');
            return redirect()->back() ;
        }


       return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags',  $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body'=>'required|string|min:3',
            'url'=>'image|required|mimes:jpg,jpeg,gif,png|max:2048'
           
        ]);
         /* $post = new Post();
       
          $post->title= $request->post('title');
           $post->author= $request->post('author');
           $post->body= $request->post('body');
           $post->save();
           $post->tags()->attach($request->tag_id);*/
            
         //  $img_name = time().'.' . $request->url->getClientOriginalExtension();
         
         
            $image = $request->file('url'); 
             $path = $image->store('upload', 'public'); 
        
         
         $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'url' =>$path,
            'category_id' => $request->category_id,
           

       ]);

    //   $request->url->move(\public_path('upload'),$img_name);

       $post->tags()->attach($request->tags);

        return Redirect::route('admin.posts')
        ->with('alert.succes',"Post ({$post->name}) created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $post = Post::findOrFail($id);
       // return View('admin.showPost')->with('post',$post) ;
       return View('admin.posts.edit')->with('post',$post) ;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::findOrFail($id);

       
          return view('admin.posts.edit',[
              'post' => $post, 
              'tags' => Tag::get(['id','name']),
              'categories' => Category::get(['name'])
              
          ]);


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body'=>'required|string|min:3',
            'url'=>'image|required|mimes:jpg,jpeg,gif,png|max:2048'
           
        ]);
        $post =Post::findOrFail($id);

       
        
            $image = $request->file('url'); 
             $path = $image->storeAs('upload',basename($post->url), 'public'); 
        


     /*   $post->update([
            'title' => $request->post('title'),
            'author' => $request->post('author'),
            'body' => $request->post('body'), 
        ]);*/
        $post->title =$request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->url = $path;
        $post->save();
        $post->tags()->sync($request->tags);


        return redirect('/admin/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = Post::findOrFail($id);
      
        $post->delete();
        $post->tags()->detach();
      
        Storage::disk('public')->delete($post->url);


        return redirect()->route('admin.posts');
            
    }
}
