@extends('layouts.layout')

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @endpush


    @section('content')
        @include('templates.Quize.buttunCreate')

        <section class="form-quize container mx-auto">
        </section>

        @include('templates.Quize.buttonSave')
    @endsection

    @push('script')
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/get_api__slider.js"></script>
    @endpush
