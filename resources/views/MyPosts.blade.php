{{-- @extends('layouts.layout')

    @push('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @section('title', 'Blog')

    @section('header')
        @include('templates.Blog.header')
    @endsection

    @section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($posts as $post)
            @include("templates.Blog.post", ["post" => $post])
        @endforeach
    </div>
    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
@endsection --}}
