<?php

Auth::routes();

Route::get('/', function () {
    $posts = App\Post::orderBy('created_at', 'desc')
        ->paginate(5);

    return view('blog')
        ->with('posts', $posts);
});

Route::resource('posts', 'PostController');
