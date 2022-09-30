
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('header/assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('header/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('header/assets/css/feathericon.min.css')}}">

    <link rel="stylesheet" href="{{asset('header/assets/css/icons.min.css')}}">
    <!-- Snackbar CSS -->
	<link rel="stylesheet" href="{{asset('header/assets/plugins/snackbar/snackbar.min.css')}}">
    <!-- Sweet Alert css -->
    <link rel="stylesheet" href="{{asset('header/assets/plugins/sweetalert2/sweetalert2.min.css')}}">
    <!-- Snackbar Css -->
    <link rel="stylesheet" href="{{asset('header/assets/plugins/snackbar/snackbar.min.css')}}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{asset('header/assets/plugins/select2/css/select2.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('header/assets/css/style.css')}}">
    <!-- Page CSS -->
    @stack('page-css')
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>


    <!-- Main Wrapper -->
    <div class="main-wrapper">



        <!-- Page Wrapper -->
        <div class="page-wrapper" style="margin-left: 285px">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        @stack('page-header')
                    </div>
                </div>
                <!-- /Page Header -->


                @yield('contents')
                <!-- add sales modal-->
                 <!-- / add sales modal -->
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

</body>
<!-- jQuery -->
<script src="{{asset('header/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('header/assets/js/popper.min.js')}}"></script>
<script src="{{asset('header/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('header/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Sweet Alert Js -->
<script src="{{asset('header/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Snackbar Js -->
<script src="{{asset('header/assets/plugins/snackbar/snackbar.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('header/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('header/assets/js/script.js')}}"></script>

@stack('page-js')
</html>
