@extends('pages.master')

@section('title')
    Home page
@endsection

@section('favicon')
    @include('pages.partials.favicon')
@endsection

@section('css')
    @include('pages.partials.css')
@endsection

@section('preloader')
    @include('pages.partials.preloader_wrapper')
@endsection

@section('main-wrapper')
    @include('pages.partials.nav')
    @include('pages.partials.header')
    @include('pages.home.partials.about_us')
    @include('pages.home.partials.video_area')
    @include('pages.home.partials.counterup_area')
    @include('pages.home.partials.why_choose')
    @include('pages.home.partials.how_it_works')
    @include('pages.home.partials.screenshort_area')
    @include('pages.home.partials.testemonial')
    @include('pages.home.partials.pricing_plan')
    @include('pages.home.partials.team_member')
    @include('pages.partials.footer')
    @include('pages.partials.back_to_top')
    @include('pages.partials.js')
@endsection

