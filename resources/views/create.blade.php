@extends('layouts.layout')

    @push('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @section('title', 'Create')

    @section('header')
        @include('templates.Blog.header')
    @endsection

    @section('content')

        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium">{{ isset($post) ? "Edit post {$post->title}" : 'Add post' }}</h3>
            <div class="create-post t-8">
                <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($post) ? route("posts.update", $post->id) : route("posts.store") }}">
                    @csrf

                    @if(isset($post))
                        @method('PUT')
                    @endif

                    <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3
                    @error('title') border-red-500 @enderror" placeholder="Название" value="{{ $post->title ?? '' }}" />

                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3
                    @error('description') border-red-500 @enderror" placeholder="Описание" value="{{ $post->description ?? '' }}" />

                    @error('description')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    @if(isset($post) && $post->thumbnail)
                        <div>
                            <img class="h-64 w-64" src="/storage/{{ $post->thumbnail }}">
                        </div>
                    @endif

                    <input name="thumbnail" type="file" class="w-full h-12" placeholder="cover" />

                    @error('thumbnail')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
                </form>
            </div>
        </div>
    @endsection
