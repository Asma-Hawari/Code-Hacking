<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Auth;
use App\Category;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {


         $user_id = 1;
         $photo_id = 1 ;
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
        }
        
      
         if ($file = $request->file('photo'))
         {

            $name = time().$file->getClientOriginalName();
          // Storage::disk('local')->put($file, $name
          $file->move('images' , $name) ;
                     //$path = $request->photo->storeAs('images', $name);
            $photo = Photo::create(['path'=> $name]);
            $photo_id = $photo->id;
            
         }
         // you can create the posts for the specific user using :
         //$user->posts()->create($request->all());
        $post = Post::create(['user_id'=>1 , 'category_id'=>$request->category_id , 'photo_id'=>$photo_id , 'title'=>$request->title , 'body'=>$request->body]);
        return redirect ('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
