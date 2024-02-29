<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

  <link href={{ asset('img/brand/favicon.png') }} rel="icon" type="image/png">

    {{-- bootstrap --}}
    <link rel="stylesheet" href={{ asset('bootstrap/dist/css/bootstrap.min.css') }}>

    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">

      <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href={{ asset('js/plugins/nucleo/css/nucleo.css') }} rel="stylesheet" />
  <link href={{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }} rel="stylesheet" />

    {{-- argon css --}}
    <link href={{ asset('css/argon-dashboard.css?v=1.1.2') }} rel="stylesheet" />

    {{-- toastify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


    @yield('css')

</head>
<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Brand -->
          <a class="navbar-brand pt-0" href="./index.html">
            <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
          </a>
          <!-- User -->
          <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
    ">
                  </span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="./index.html">
                    <img src="./assets/img/brand/blue.png">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fa fa-search"></span>
                  </div>
                </div>
              </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
              <li class="nav-item  active ">
                <a class="nav-link  active " href={{ route('dashboard') }}>
                  <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
              </li>

              <li class="nav-item  active ">
                <a class="nav-link  active d-flex" href={{ route('reservation') }}>
                  <i class="ni ni-box-2 text-danger"></i> Reservations

                  {{-- <span class="badge badge-danger ms 2">{{ $reservationCount }}</span> --}}
                    
                  @if(isset($reservationCount))
    <span class="badge badge-danger ms-2">{{ $reservationCount }}</span>
@endif

                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link " href="./examples/icons.html">
                  <i class="ni ni-planet text-blue"></i> Icons
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="./examples/maps.html">
                  <i class="ni ni-pin-3 text-orange"></i> Maps
                </a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link " href={{ route('menu.index') }}>
                  <i class="ni ni-books text-yellow"></i> Menu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href={{ route('gallery.index') }}>
                  <i class="ni ni-image text-success"></i> Gallery
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href={{ route('setting') }}>
                  <i class="ni ni-bullet-list-67 text-red"></i> Setting
                </a>
              </li>

              <li class="nav-item">
                
                <form action="{{ route('logout') }}" method="POST" >
                  
                  @csrf
                  <button type="submit" class="nav-link">
                    <i class="ni ni-key-25 text-info"></i>
                   Logout

                  </button>
                </form>
              </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                  <i class="ni ni-spaceship"></i> Getting started
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                  <i class="ni ni-palette"></i> Foundation
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                  <i class="ni ni-ui-04"></i> Components
                </a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item active active-pro">
                <a class="nav-link" href="./examples/upgrade.html">
                  <i class="ni ni-send text-dark"></i> Upgrade to PRO
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


<div class="main-content">
    @yield('content')

</div>


      {{-- <script src={{ asset('bootstrap/dist/js/bootstrap.min.js') }}></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/js/argon-design-system.min.js" integrity="sha256-viSA1n+z5Zq4VnY/+mgLTTo+aGNdT09w55rxHMuZSss=" crossorigin="anonymous"></script> --}}

    <script src={{ asset('js/plugins/jquery/dist/jquery.min.js') }}></script>
    {{-- <script src={{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--   Optional JS   -->
    <script src={{ asset('js/plugins/chart.js/dist/Chart.min.js') }}></script>
    <script src={{ asset('js/plugins/chart.js/dist/Chart.extension.js') }}></script>
    <!--   Argon JS   -->
    <script src={{ asset('js/argon-dashboard.min.js?v=1.1.2') }}></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    @yield('script')



    @if(session()->has('error'))

    <script>
      Toastify({
text: "{{ session('error') }}",
className: "py-2",
close: true,
style: {
    background: "#84BCDA",
    borderRadius: "5px",
  },
position: 'center',
}).showToast();

  </script>
    @endif

    @if(session()->has('success'))
    <script>
                  Toastify({
text: "{{ session('success') }}",
className: "bg-success py-2",
close: true,
position: 'right',
}).showToast();
    </script>

    @endif

    {{-- <script>
      const successToast = (message) => {
        Toastify({
text: message,
close: true,
gravity: "top",
className: "bg-dark",
position: 'center',
}).showToast();
      }
    </script> --}}
</body>
</html>