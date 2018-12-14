<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'list', 'delete', 'edit', 'save', 'create', 'store']);
    }

    public function index(Post $posts) {
        $posts = $posts->all()->reverse();
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function list(Post $posts) {
        $posts = $posts->all()->reverse();

        return view('dashboard.posts', compact('posts'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('dashboard.edit_post', compact('post'));
    }

    public function save(Post $post) {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $data = request()->all();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();
        return redirect('/posts');
    }

    public function create() {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store() {

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'category'  => 'required'

        ]);
        $data = request()->all();
        $post = new Post(request(['title', 'body', 'image']));
        $post->cat_id = $data['category'];
        auth()->user()->publish($post);
        return redirect('/posts');
    }

    public function delete(Post $post) {
        $post = $post->delete();
    }
}
