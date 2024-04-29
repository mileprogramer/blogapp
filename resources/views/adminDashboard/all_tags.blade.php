@extends('./adminDashboard/master')

@section('title')
    All Posts
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
              <h1 class="p-3">All tags</h1>
              <div class="row">
                <div class="card col-3 p-0">
                    <div class="card-header">Tag name: Sports</div>
                    <div class="card-footer">
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-warning">Edit</button>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!-- End Page wrapper  -->
  </div>
@endsection

@section('js')
  <!-- End Wrapper -->
  @include('adminDashboard.partials.js')
@endsection
