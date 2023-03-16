<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostForm;
use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
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

        return view('Show', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route("posts.show", $id));
    }

    // public function my_posts(){
    //     $user_id = auth()->id;

    //     $posts = Auth::user()->posts->paginate(6);

    //     return view('MyPosts', [
    //         "posts" => $posts,
    //     ]);
    // }

    public function create()
    {
        return view("create",[]);
    }


    public function store(PostForm $request)
    {
        Post::create($this->saveImage($request));
        return redirect(route("blog"));
    }


    public function edit(Post $post)
    {
        if($post->user == auth()->user()){

            return view("create", [
                "post" => $post,
            ]);
        }
        else{
            return redirect(route("blog"));
        }
    }


    public function update(PostForm $request, Post $post)
    {

        $post->update($this->saveImage($request));

        return redirect(route("blog"));
    }
    public function delete(Post $post)
    {
        if($post->user == auth()->user()){
            $post->delete();
            return redirect(route("blog"));
        }
        else{
            return redirect(route("blog"));
        }

    }

    protected function saveImage (PostForm $request)
    {
        $data = $request->validated();
        if($request->has("thumbnail")){
            $thumbnail = str_replace("public/","",$request->file("thumbnail")->store("public/"));
            $data["thumbnail"] = $thumbnail;
        }
        return $data;
    }

}
