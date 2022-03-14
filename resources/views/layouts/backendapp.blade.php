<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('frontendapp/images/logo/favourite_icon_1.png') }}" type="image/ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name') }}</title>

    @yield('backend__css')

    <!-- Bootstrap -->
    <link href="{{ asset('backendapp/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backendapp/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backendapp/css/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('backendapp/css/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('backendapp/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('backendapp/css/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backendapp/css/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('backendapp/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                      <a href="{{ route('frontend.home') }}" class="site_title" target="_blank">
                        <img src="{{ asset('frontendapp/images/logo/logo_1x.png') }}" alt="{{ config('app.name') }}">
                      </a>
                  </div>
                  <div class="clearfix"></div>

                  <div class="profile clearfix">
                      <div class="profile_pic">
                          <img src="{{ asset('backendapp/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                          <span>Welcome,</span>
                          <h2>{{ Auth::user()->name }}</h2>
                      </div>
                  </div>

                  <br />

                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                      <div class="menu_section">
                          <h3>General</h3>
                          <ul class="nav side-menu">
                              <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home <span class=""></span></a></li>

                            <li><a><i class="fa fa-desktop"></i> Banners <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('backend.banner.create') }}">Add_Banner</a></li>
                                    <li><a href="{{ route('backend.banner.index') }}">All_Banner</a></li>
                                </ul>
                            </li>


                            <li>
                                <a><i class="fa fa-desktop"></i> Product <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                      <li><a href="{{ route('backend.product.index') }}">All Product</a></li>
                                      <li><a href="{{ route('backend.product.create') }}">Product Add</a></li>
                                      <li><a href="{{ route('backend.category.index') }}">Category</a></li>
                                      <li><a href="{{ route('backend.size.index') }}">Size</a></li>
                                      <li><a href="{{ route('backend.color.index') }}">Color</a></li>
                                  </ul>
                            </li>

                            <li>
                                <a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="form.html">General Form</a></li>
                                      <li><a href="form_advanced.html">Advanced Components</a></li>
                                    </ul>
                            </li>

                          </ul>
                      </div>
                  </div>


                  <div class="sidebar-footer hidden-small">
                      <a data-toggle="tooltip" data-placement="top" title="Settings">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Lock">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                      </a>
                  </div>

              </div>
          </div>

          <div class="top_nav">
              <div class="nav_menu">
                  <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <nav class="nav navbar-nav">
                      <ul class=" navbar-right">
                          <li class="nav-item dropdown open" style="padding-left: 15px;">
                              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                  id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                  <img src="{{ asset('backendapp/images/img.jpg')}}" alt="">{{ Auth::user()->name }}
                              </a>
                              <div class="dropdown-menu dropdown-usermenu pull-right"
                                  aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                                  <a class="dropdown-item" href="javascript:;">
                                      <span class="badge bg-red pull-right">50%</span>
                                      <span>Settings</span>
                                  </a>
                                  <a class="dropdown-item" href="javascript:;">Help</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                          <li role="presentation" class="nav-item dropdown open">
                              <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                  data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-envelope-o"></i>
                                  <span class="badge bg-green">6</span>
                              </a>
                              <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                  aria-labelledby="navbarDropdown1">
                                  <li class="nav-item">
                                      <a class="dropdown-item">
                                          <span class="image"><img src="{{ asset('backendapp/images/img.jpg')}}"
                                                  alt="Profile Image" /></span>
                                          <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                          </span>
                                          <span class="message">
                                              Film festivals used to be do-or-die moments for movie makers. They were
                                              where...
                                          </span>
                                      </a>
                                  </li>
                                    <li class="nav-item">
                                      <div class="text-center">
                                          <a class="dropdown-item">
                                              <strong>See All Alerts</strong>
                                              <i class="fa fa-angle-right"></i>
                                          </a>
                                      </div>
                                    </li>
                              </ul>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>


          <div class="right_col" role="main">

              @yield('content')

          </div>


          <footer>
              <div class="pull-right">
                  Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
              </div>
              <div class="clearfix"></div>
          </footer>

      </div>
  </div>
    <!-- jQuery -->
    <script src="{{ asset('backendapp/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backendapp/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('backendapp/js/bootstrap-progressbar.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('backendapp/js/daterangepicker.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('backendapp/js/custom.min.js') }}"></script>
    @yield('backend__js')
  </body>
</html>
