<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderBy("created_at", "DESC")->paginate(6);

        return view('Blog', [
            "posts" => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('Post', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route("posts.show", $id));
    }

    public function my_posts(){
        $id = Auth::id();
        $user = User::findOrFail($id)->posts();

        $user->posts()->create($request->validated())->orderBy("created_at", "DESC")->paginate(6);

        return view('my_posts', [
            "posts" => $posts,
        ]);
    }


    public function create()
    {
        return view("posts.create", []);
    }

    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());

        return redirect(route("blog"));
    }

    public function edit(Post $post)
    {
        return view("posts.create", [
            "post" => $post,
        ]);
    }

    public function update(PostFormRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect(route("blog"));
    }


    public function deletePost($id) {
        Post::find($id)->delete();

        return redirect(route("blog"));
    }
}
