@extends('./adminDashboard/master')

@section('title')
    Edit tag
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
                <h1 class="p-3">Edit tag</h1>
                @include('adminDashboard.tag.form_edit_tag', ["tag_name"=>$tag_name])
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
