@extends('./adminDashboard/master')

@section('title')
    Login page
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
        <div class="page-wrapper m-0 auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="container">
                @include('adminDashboard.partials.login_form')
            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
@endsection

@section('js')
    <!-- End Wrapper -->
    @include('adminDashboard.partials.js')
@endsection
