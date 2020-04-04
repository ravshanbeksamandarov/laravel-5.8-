@php

    use App\Feedback;
    $new_messages = Feedback::unreaded()->get();

@endphp
<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env("APP_NAME", "Sayt") }} - Boshqaruv qismi</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/dashboard/apple-icon.png">
    <link rel="shortcut icon" href="/dashboard/favicon.ico">

    <link rel="stylesheet" href="/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/dashboard/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/dashboard/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="/dashboard/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="/dashboard/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="/dashboard/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                    <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Bosh sahifa </a>
                    </li>

                    <h3 class="menu-title">Barcha bo'limlar</h3><!-- /.menu-title -->

                    <li class="nav-item {{ request()->is('admin/posts*') ? 'active' : '' }}">
                        <a href="{{ route('admin.posts.index') }}"> <i class="menu-icon fa fa-tasks"></i>Yangiliklar</a>

                    </li>
                    <li class="nav-item  {{ request()->is('admin/feedbacks*') ? 'active' : '' }}">
                        <a href="{{ route('admin.feedbacks.index') }}"> <i class="menu-icon ti-email"></i>Xabarlar</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Izlash ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="nav-item dropdown no-arrow mx-1">
                            <button class="nav-link dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                     <span class="count bg-primary">{{count($new_messages)}}</span>
                            </button>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Yangi kelgan xabarlar
                                </h6>
                                @foreach ($new_messages as $item)

                                <a class="dropdown-item" href="{{route('admin.feedbacks.show', $item->id)}}">
                                    <span class="photo media-left"><img alt="avatar" src="/dashboard/images/admin.jpg"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">{{ $item->name}}</span>
                                        <span class="time float-right">{{$item->created_at->format('H:i d.m.y')}}</span>
                                        <p>{{$item->subject}}</p>
                                    </span>
                                </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500" href="{{route('admin.feedbacks.index')}}">Barcha xabarlar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="margin-top: -2px" class="user-avatar rounded-circle" src="/dashboard/images/admin.jpg" alt="User Avatar">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{ auth()->user()->name }}</b></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                              <i class="fa fa-user"></i>
                              Sozlash
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <i class="fa fa-sign-out"></i>
                              Chiqish
                            </a>
                        </div>
                        {{-- <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        {{-- <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="btn btn-link" type="submit"><i class="fa fa-sign-out"></i>Logout</button>
                        </form> --}}
                        {{-- </div> --}}
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-uz"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Boshqaruvdan chiqasizmi?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Agar tizimdan chiqmoqchi bo'lsangiz "Ha" tugmasini bosing.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Bekor</button>

                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="btn btn-primary" type="submit">Ha</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </header>


         @yield('content')
        </div>

    <script src="/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/dashboard/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/dashboard/assets/js/main.js"></script>


    <script src="/dashboard/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/dashboard/assets/js/dashboard.js"></script>
    <script src="/dashboard/assets/js/widgets.js"></script>
    <script src="/dashboard/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
