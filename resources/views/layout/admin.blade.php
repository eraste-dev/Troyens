<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../back/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../back/images/favicon.png" type="image/x-icon">
    <title>{{ $html_title ?? '' }} {{ ' | ' . env('APP_NAME') }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('back/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/responsive.css') }}">

    @stack('styles')
</head>

<body class="">
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layout.back.topBar')
        <!-- Page Header Ends
                                -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">
            <!-- Page Sidebar Start-->
            @include('layout.back.sideBar')
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                @endif

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row starter-main">
                        @yield('content')
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright {{ date('Y') }} ©.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">
                                Dévelopé par <a href="https://www.facebook.com/Entreprise.E.I.D" target="_blank">
                                    E.I.D
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('back/js/jquery-3.5.1.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('back/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('back/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('back/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('back/js/config.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('back/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('back/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Plugins JS start-->
    <script src="{{ asset('back/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('back/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('back/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('back/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS Ends-->

    <!-- Theme js-->
    <script src="{{ asset('back/js/script.js') }}"></script>
    {{-- <script src="{{ asset('back/js/theme-customizer/customizer.js') }}"></script> --}}
    <!-- login js-->

    <!-- Plugin used-->
    <script src="{{ asset('back/customs/app.js') }}"></script>
    @stack('scripts')

    <script src="{{ asset('back/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('back/js/notify/notify-script.js') }}"></script>

    <script>
        if ("{{ Session::has('success') }}") {
            Toast("Succès", "{{ Session::get('success') }}")
        }

        if ("{{ Session::has('error') }}") {
            Toast("Une erreur s'est produite", "{{ Session::get('error') }}", 'danger')
        }
    </script>
</body>

</html>
