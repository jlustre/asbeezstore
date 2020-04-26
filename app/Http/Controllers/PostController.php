<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct() {
        //This will prevent to access the pages except index and show
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

/**
* the following is used for debugging
**/
    // public function index()
    // {
    //     \DB::enableQueryLog();
    //     $posts = Post::with('user')->latest()->paginate(5);
    //     view('posts.index', compact('posts'))->render();
    //     dd(\DB::getQueryLog());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->user()->posts()->create($request->only('title','content'));
        return redirect()->route('posts.index')->with('successMsg', "Your post has been submitted!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // echo ' I am here at line '.__LINE__.'<pre>';
        // print_r($post);
        $post->increment('views');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post); //See PostPolicy update method
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->only('title','content'));
        return redirect()->route('posts.index')->with('successMsg', "Your post has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); //See PostPolicy delete method
        $post->delete();
        return redirect()->route('posts.index')->with('successMsg', "Your post has been deleted!");
    }
}
