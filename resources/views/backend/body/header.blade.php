<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Pets Crazy Life</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('backend-assets/') }}/images/favicon.ico">

  <!-- C3 charts css -->
  <link href="{{ asset('backend-assets/') }}/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

  <!-- Plugins css-->
  <link href="{{ asset('backend-assets') }}/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <link href="{{ asset('backend-assets') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="{{ asset('backend-assets') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend-assets') }}/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('backend-assets') }}/plugins/switchery/switchery.min.css">

  <!-- App css -->
  <link href="{{ asset('backend-assets/') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('backend-assets/') }}/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend-assets/') }}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend-assets/') }}/css/style.css" rel="stylesheet" type="text/css" />

  @yield('custom_css')

  <script src="{{ asset('backend-assets/') }}/js/modernizr.min.js"></script>

</head>

<body>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <a href="index.html" class="logo">
          <span>
            <img src="{{ asset('backend-assets') }}/images/logo.png" alt="" height="25">
          </span>
          <i>
            <img src="{{ asset('backend-assets') }}/images/logo_sm.png" alt="" height="28">
          </i>
        </a>
      </div>

      <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
          <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#"
              role="button" aria-haspopup="false" aria-expanded="false">
              <i class="dripicons-bell noti-icon"></i>
              <span class="badge badge-pink noti-icon-badge">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
              </div>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small>
                </p>
              </a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                <p class="notify-details">New user registered.<small class="text-muted">1 min
                    ago</small></p>
              </a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small>
                </p>
              </a>
              <!-- All-->
              <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                View All
              </a>

            </div>
          </li>

          <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
              role="button" aria-haspopup="false" aria-expanded="false">
              <img class="h-8 w-8 rounded-circle object-cover" src="{{ Auth::user()->profile_photo_url ?? null }}"
                alt="{{ Auth::user()->name ?? '' }}" />
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5 class="text-overflow"><small>{{ Auth::user()->name ?? "" }}</small></h5>
              </div>

              <!-- item-->
              <a href="{{ route('profile.show') }}" class="dropdown-item notify-item">
                <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="zmdi zmdi-settings"></i> <span>Settings</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
              </a>

              <!-- item-->
              <form action="{{ route('logout') }}" method="post">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item notify-item">
                  <i class="zmdi zmdi-power"></i> <span>Logout</span>
                </a>
              </form>


            </div>
          </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
          <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
              <i class="dripicons-menu"></i>
            </button>
          </li>
          <li class="hide-phone app-search">
            <form role="search" class="">
              <input type="text" placeholder="Search..." class="form-control">
              <a href=""><i class="fa fa-search"></i></a>
            </form>
          </li>
        </ul>

      </nav>

    </div>
    <!-- Top Bar End -->