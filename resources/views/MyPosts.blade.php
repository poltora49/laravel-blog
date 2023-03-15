@extends('layouts.layout')

    @push('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @section('title', 'Blog')

    @section('content')
        @include('templates.Blog.header')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
            @foreach($posts as $post)
                @include("templates.Blog.post", ["post" => $post])
            @endforeach
        </div>
        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>
    @endsection

    @push('script')
    @endpush
