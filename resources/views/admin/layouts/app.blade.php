<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>@yield('title')Admin Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    
        <!-- Fonts and icons -->
        <script src="{{ asset('admin-assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
          WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
              families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
              urls: ["{{ asset('admin-assets/css/fonts.min.css') }}"],
            },
            active: function () {
              sessionStorage.fonts = true;
            },
          });
        </script>
    
        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin-assets/css/plugins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin-assets/css/kaiadmin.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs5.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">

    
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />
    </head>
<body>
    <div class="wrapper">
      <!-- Sidebar -->
        @include('admin.layouts.sidebar')
      <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('admin-assets/img/logo.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                    <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                    </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a
                                    class="dropdown-toggle profile-pic"
                                    data-bs-toggle="dropdown"
                                    href="#"
                                    aria-expanded="false"
                                >
                                    <div class="avatar-sm d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; font-size: 16px; font-weight: bold; color: white;">
                                        @if (!empty(Auth::guard('admin')->user()->avatar))
                                            <img src="{{ asset('uploads/profiles/' . Auth::guard('admin')->user()->avatar) }}" alt="image profile" class="avatar-img rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            @php
                                                $user = Auth::guard('admin')->user();
                                                $firstLetter = strtoupper(substr($user->name, 0, 1));
                                                $colors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#FF33A1', '#FFC133', '#33FFC1'];
                                                $hash = crc32($user->email); // Generate a consistent hash based on email
                                                $index = $hash % count($colors); // Map hash to a color index
                                                $bgColor = $colors[$index];
                                            @endphp
                                            <div style="background-color: {{ $bgColor }}; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                {{ $firstLetter }}
                                            </div>
                                        @endif
                                    </div>
                                
                                
                                    <span class="profile-username">
                                    <span class="op-7">Hi,</span>
                                    <span class="fw-bold">{{ explode(' ', Auth::guard('admin')->user()->name)[0] }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-text p-0">
                                                <h4>{{ Auth::guard('admin')->user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('user.edit', Auth::guard('admin')->user()->id) }}">Account Setting</a>
                                        <a class="dropdown-item" href="{{ route('admin.changePass') }}">Change Password</a>

                                        
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                                    </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- Content -->
            @yield('content')
            <!-- End Content -->

            <footer class="footer">
                <div class="container-fluid d-flex">
                
                <div class="copyright" >
                    2024, made with <i class="fa fa-heart heart text-danger"></i> by
                    <a href="https://ahmadabdelghani02.github.io/Portfolio/">Ahmad Abdelghani</a>
                </div>
                
                </div>
            </footer>
        </div>
    <!-- End Custom template -->
    </div>
    <!-- Core JS Files -->
    <script src="{{ asset('admin-assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Plugins -->
    <script src="{{ asset('admin-assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Libraries -->
    <script src="{{ asset('admin-assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('admin-assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Notifications -->
    <script src="{{ asset('admin-assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Vector Maps -->
    <script src="{{ asset('admin-assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- SweetAlert -->
    <script src="{{ asset('admin-assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin Core and Demo Scripts -->
    <script src="{{ asset('admin-assets/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('admin-assets/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Summernote Scripts -->
    <script src="{{ asset('admin-assets/plugins/summernote/summernote-bs5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>




    <script>
        jQuery(document).ready(function ($) {
            $(document).on('click', function (e) {
                // If the clicked target is not inside a .dropdown-menu or .note-btn
                if (!$(e.target).closest('.dropdown-menu, .note-btn').length) {
                    // Hide all dropdown menus
                    $('.note-btn-group .dropdown-menu').removeClass('show');
                }
            });

            $(document).on('click', '.note-btn', function (e) {
                // Prevent the click event from bubbling up to the document handler
                e.stopPropagation();

                // Close all dropdowns except the one clicked
                $('.note-btn-group .dropdown-menu').not($(this).closest('.note-btn-group').find('.dropdown-menu')).removeClass('show');
                
                // Toggle the 'show' class on the closest .dropdown-menu
                $(this).closest('.note-btn-group').find('.dropdown-menu').toggleClass('show');
            });



            // Summernote
            $('.summernote').summernote({
                height: '300px'
            });

            // $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            // type: "line",
            // height: "70",
            // width: "100%",
            // lineWidth: "2",
            // lineColor: "#177dff",
            // fillColor: "rgba(23, 125, 255, 0.14)",
            // });

            $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
            });

            $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
            });

            $("#name, #title").change(function () {
                $("#submit").prop("disabled", true);
                $ele = $(this);

                $.ajax({
                    url: "{{ route('getSlug') }}",
                    type: "get",
                    data: { title: $ele.val() },
                    dataType: "json",
                    success: function (resp) {
                        $("#submit").prop("disabled", false);
                        if (resp["status"] == 200) {
                            $("#slug").val(resp["slug"]);
                        }
                    },
                });
            });
        });
        
    </script>
    @yield('customJs')
</body>
</html>
