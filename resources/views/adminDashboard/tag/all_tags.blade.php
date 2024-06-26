@extends('./adminDashboard/master')

@section('title')
    All tags
@endsection

@section('favicon')
    @include('adminDashboard.partials.favicon')
@endsection

@section('css')
    @include('adminDashboard.partials.css')
@endsection

@section('preloader')
    @include('adminDashboard.partials.preloader')
@endsection

@section('main-wrapper')
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute"
        data-header-position="absolute" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        @include('adminDashboard.partials.header')
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        @include('adminDashboard.partials.aside')
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container">
                <h1 class="p-3">All tags</h1>
                @if (session('success') !== null)
                    <div class="alert alert-success">
                        <p class="d-inline">{{ session('success') }}</p>
                        <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}"
                            alt="" style="width: 30px; margin-top: -6px;">
                    </div>
                    @php
                        session()->forget('success');
                    @endphp
                @endif
                <div class="row gap-3">
                    @foreach ($all_tags as $tag)
                        <div class="card col-4 p-0">
                            <div class="card-header">Tag name: <h4 class="d-inline">{{ $tag['tag_name'] }}</h4>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/delete-tag/{{ $tag['slug'] }}" class="btn btn-danger">Delete</a>
                                <a href="/admin/edit-tag/{{ $tag['slug'] }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
@endsection

@section('js')
    <!-- End Wrapper -->
    <script src="{{ asset('admin_dashboard/dist/js/alert.js') }}"></script>
    @include('adminDashboard.partials.js')
@endsection
