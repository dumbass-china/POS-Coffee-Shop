<!DOCTYPE html>
<html lang="en" class="swal2-shown swal2-toast-shown">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jib Poch Coffee Shop</title>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('bootstrap') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    {{-- Sidebar Template .css --}}
    <link href="{{ asset('bootstrap-assets/sidebars') }}/sidebars.css" rel="stylesheet" />
    {{-- Font-awesome cnd --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet"
        href="{{ asset('assets') }}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css"> --}}
    @stack('styles')



</head>

<body class="sidebar-mini swal2-shown swal2-toast-shown">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 p-0">
                @include('partials.sidebar')
            </div>
            <div class="col-11 p-0">
                @include('partials.navbar')
                {{-- @include('partials.menu') --}}
                @yield('content')

            </div>
        </div>
    </div>




    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Sidebar Template JS -->
    <script src="{{ asset('bootstrap-assets/sidebars') }}/sidebars.js"></script>
    <!-- Custom Script -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>
    @stack('scripts')

</body>

</html>
