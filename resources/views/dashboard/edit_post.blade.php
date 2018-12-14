@extends('dashboard.master')

@section('postsActive')
    active
@endsection
@section('content')

        @section('title')
            Edit post
        @endsection
        <form method="post" action="/posts/{{$post->id}}/edit">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            @include('layouts.errors')
        </form>


@endsection