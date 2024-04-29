@extends('pages.master')

@section('title')
    Blog page
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
{{--     @include('pages.partials.header') --}}
    @include('pages.layouts.breadcrumbs')
    @include('pages.blog.partials.page_content')
    @include('pages.partials.footer')
    @include('pages.partials.back_to_top')
    @include('pages.partials.js')
@endsection

