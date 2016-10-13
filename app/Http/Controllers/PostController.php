<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect('posts')
            ->with('message', 'Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        return view('post')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  Post        $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('posts')
            ->with('message', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('posts')
            ->with('message', 'Post Deleted.');
    }
}
