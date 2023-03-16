<?php

namespace App\Http\Controllers;

use App\Request\PostForm;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create",[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostForm $request){
        Post::create($request->validated());

        return redirect(route("blog"));
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.create", [
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostForm $request, Post $post)
    {
        $post->update($request->validated());

        return redirect(route("blog"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect(route("blog"));
    }
}
