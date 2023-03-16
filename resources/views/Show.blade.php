@extends('layouts.layout')

    @push('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @section('title', $post->title)

    @section('header')
        @include('templates.Blog.header')
    @endsection

    @section('content')
        <div class="m-auto px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl" >
                <div>
                    <img src="/storage/{{ $post->thumbnail }}">
                </div>
                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">{{ $post->title }}</h2>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        {{ $post->description }}
                    </p>
                </div>
            </div>


            <div>
                <section class="rounded-b-lg mt-4">
                    @auth("web")

                        <form method="POST" action="{{ route("comment", $post->id) }}">
                            @csrf

                            <textarea name="text" class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline
                            text-2xl @error('text') border-red-500 @enderror" placeholder="Your comment..."
                            spellcheck="false"></textarea>

                            @error('text')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="font-bold py-2 px-4 w-full bg-purple-400 text-lg
                            text-white shadow-md rounded-lg ">Enter</button>
                        </form>

                    @endauth
                    <div id="task-comments" class="pt-4">
                        @foreach($post->comments as $comment)

                            <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start
                            shadow-lg mb-4">
                                <div class="flex flex-row justify-center mr-2">
                                    <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left
                                    ">{{ $comment->user->name }}</h3>
                                </div>

                                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left
                                ">{{ $comment->text }}</p>
                            </div>

                        @endforeach
                    </div>
                    @if ($post->user == auth()->user())
                    <a href="{{ route("posts.edit", $post->id) }}" class="font-semibold my-4 py-2 px-4 bg-purple-800 text-lg
                        text-white shadow-md rounded-lg">Редактировать</a>
                    <form action="{{ route("posts.delete", $post->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="text-white font-semibold my-4 py-2 px-4 bg-red-600 text-lg rounded-lg
                        ">Delete</button>
                    </form>
                    @endif

                </section>

            </div>
        </div>
    @endsection
