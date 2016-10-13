@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ isset($post) ? 'Edit' : 'Create' }} Post</h3>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="{{ isset($post) ? url('posts', [$post->getKey()]) : url('posts') }}">
                            {{ csrf_field() }}

                            {{ isset($post) ? method_field('PUT') : ''}}

                            <div class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input id="title" name="title" type="text" class="form-control input-md" value="{{ old('title') ?? $post->title ?? '' }}" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="body">Body</label>
                                <textarea class="form-control" id="body" name="body" rows="10">{{ old('body') ?? $post->body ?? '' }}</textarea>
                                <span class="help-block">Tip: You can type markdown in here!</span>
                            </div>

                            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

