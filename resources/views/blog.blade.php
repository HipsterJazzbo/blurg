@extends('layouts.blog')

@section('site-heading', 'Blurg')

@section('site-subheading', 'A Little Mongo Blog for Zainab')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @foreach($posts as $post)
            @include('post-excerpt', $post)
        @endforeach

        <!-- Pager -->
            {{ $posts->links() }}
        </div>
    </div>
@endsection