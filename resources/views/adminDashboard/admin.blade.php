<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Dashboard</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href={{asset("admin_dashboard/assets/images/favicon.png")}}
    />
    <!-- Custom CSS -->
    <link href={{asset("admin_dashboard/assets/libs/flot/css/float-chart.css")}} rel="stylesheet" />
    <!-- Custom CSS -->
    <link href={{asset("admin_dashboard/dist/css/style.min.css")}} rel="stylesheet" />
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src={{asset("admin_dashboard/assets/images/logo-icon.png")}} 
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img
                  src={{asset("admin_dashboard/assets/images/logo-text.png")}}
                  alt="homepage"
                  class="light-logo"
                />
              </span>
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                  <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                    ><i class="mdi mdi-note"></i
                    ><span class="hide-menu">Posts</span></a
                  >
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="index.html" class="sidebar-link"
                        ><i class="mdi mdi-note-outline"></i
                        ><span class="hide-menu">All posts</span></a
                      >
                    </li>
                    <li class="sidebar-item">
                      <a href="addPost.html" class="sidebar-link"
                        ><i class="mdi mdi-note-plus"></i
                        ><span class="hide-menu">Add post</span></a
                      >
                    </li>
                  </ul>
                </li>
                <li class="sidebar-item">
                  <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                    ><i class="mdi mdi-note"></i
                    ><span class="hide-menu">Categories</span></a
                  >
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="categories.html" class="sidebar-link"
                        ><i class="mdi mdi-note-outline"></i
                        ><span class="hide-menu">All categories</span></a
                      >
                    </li>
                    <li class="sidebar-item">
                      <a href="addCategory.html" class="sidebar-link"
                        ><i class="mdi mdi-note-plus"></i
                        ><span class="hide-menu">Add category</span></a
                      >
                    </li>
                  </ul>
                </li>
                <li class="sidebar-item">
                  <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                    ><i class="mdi mdi-note"></i
                    ><span class="hide-menu">Tags</span></a
                  >
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="tags.html" class="sidebar-link"
                        ><i class="mdi mdi-note-outline"></i
                        ><span class="hide-menu">All tags</span></a
                      >
                    </li>
                    <li class="sidebar-item">
                      <a href="addTag.html" class="sidebar-link"
                        ><i class="mdi mdi-note-plus"></i
                        ><span class="hide-menu">Add tag</span></a
                      >
                    </li>
                  </ul>
                </li>
          </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->

        <div class="container">
            <h1 class="p-3">On the left side choose what to edit</h1>
        </div>

      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin_dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/waves.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/custom.min.js') }}"></script>
    
  </body>
</html>
