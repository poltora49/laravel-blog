@extends('layouts.layout')

    @section('title','Laravel Blade')

    @push('head')
        <link rel="stylesheet" href="/slick/slick.css"/>
        <link rel="stylesheet" href="/css/index.css">
    @endpush

    @section('header')
        @include('templates.laslesVpn.header')
    @endsection

    @section('content')
        @include('templates.LaslesVpn.mainBanner')
        @include('templates.LaslesVpn.advantages')
        @include('templates.LaslesVpn.features')
        @include('templates.LaslesVpn.services')
        @include('templates.LaslesVpn.globalMap')
        @include('templates.LaslesVpn.reviews')
        @include('templates.LaslesVpn.subscribe')
    @endsection

    @section('footer')
        @include('templates.LaslesVpn.footer')
    @endsection

    @push('script')
        <script type="text/javascript" src="/slick/slick.min.js"></script>
        <script type="text/javascript" src="js/burger.js"></script>
        {{-- <script type="text/javascript" src="js/get_api__slider.js"></script> --}}
    @endpush
