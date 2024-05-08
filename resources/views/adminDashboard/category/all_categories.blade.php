@extends('./adminDashboard/master')

@section('title')
    All Categories
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
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <!-- Topbar header - style you can find in pages.scss -->
      @include('adminDashboard.partials.header')
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      @include('adminDashboard.partials.aside')
      <!-- Page wrapper  -->
      <div class="page-wrapper">
          <div class="container">
              <h1 class="p-3">All categories</h1>
              <div class="row gap-3">
                @php
                    $output = session('output');
                @endphp
                @if (isset($output))
                    <div class="alert alert-success">
                        <p class="d-inline">{{ $output }}</p>
                        <img class="d-inline float-end btn-close-alert" src="{{ asset('img/close-alert.svg') }}" alt=""
                            style="width: 30px; margin-top: -6px;">
                    </div>
                @endIf
                @php
                    session()->forget('output');
                @endphp
                @foreach ($all_categories as $category)
                    @include('adminDashboard.category.category', ["category"=>$category])
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
