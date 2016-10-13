@extends('layouts.blog')

@section('site-heading', $post->title)

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <a href="{{ url('/') }}">&larr; Back to all posts</a>

            @inject('markdown', 'markdown')

            {!! $markdown->convertToHtml($post->body) !!}

            <a href="{{ url('/') }}">&larr; Back to all posts</a>
        </div>
    </div>
@endsection
