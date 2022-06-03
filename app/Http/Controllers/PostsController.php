<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostReq;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        
         $posts = Post::all(); //from db
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostReq $request)
    {

        //validations
        //can also implemented in a custom Request file CreatePostReq
        // $this->validate($request,[
        //     'title'=>'required',
        // ]);

        //An alternative way
        
       //returns submitted form data return $request->all();

       //persist data to database i.e send the submited data to the db
       Post::create($request->all());
      //after submitting
      return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the post with id $id
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
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

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }

    //You can also create a custoom view method
    public function myFirstView($mtandao,$name){
        //specify the .blade file which has the html code for the view 
        //with method renders a view with certain passed parameter from route
        //passing multiple parameters , use compact
        // return view("contact") -> with("network", "$mtandao");
        return view('contact', compact('mtandao','name'));
    }

    public function posts(){
        $people = ['hamid','said','pavillion'];

        return view('post', compact('people'));
    }
}
