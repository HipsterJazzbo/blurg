@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Posts</h3>

                    <a href="{{ url('posts/create') }}" class="btn btn-success btn-xs pull-right">+ New Post</a>

                    <div class="clearfix"></div>
                </div>

                @if($posts->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Published</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ url('posts', [$post->getKey(), 'edit']) }}" class="btn btn-default btn-xs">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="panel-body">
                        <p class="text-center">No posts yet!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
