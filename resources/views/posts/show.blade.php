@extends ('layouts.master')

@section ('content')
    <div class="col-md-8 blog-main">
        <h1>{{ $post->title }}</h1>
        {{ $post->body }}
    </div>
    <hr>
    @foreach($post->comments as $comment)
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }}
                    </strong>
                    {{ $comment->body }}
                </li>
            </ul>
        </div>
    @endforeach
    <hr>
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post->id }}/comments" >
                {{--{{ method_field('POST') }}--}}
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" cols="20" rows="10" class="form-control" placeholder="Add your comment here."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>
            </form>

        </div>
    </div>
@endsection