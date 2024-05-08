@extends('./adminDashboard/master')

@section('title')
    Edit category
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
                <h1 class="p-3">Edit category</h1>
                @include('adminDashboard.category.form_edit_category', ["name_category"=>$name_category])
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
