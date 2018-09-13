<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title> Econet Fibre </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="{{mix('css/all.css')}}" rel="stylesheet"/>
    <link href="{{mix('css/material-kit.css')}}" rel="stylesheet"/>
    {{-- <link href="{{mix('css/tailwind.css')}}" rel="stylesheet"/> --}}
    <link href="{{mix('css/app.css')}}" rel="stylesheet"/>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        @include('partials.header')
    </div>
</nav>
<!-- End Navbar -->

<div class="wrapper" id="app">
    @yield('banner')
    <div class="main">
        @yield('content')

    @if(Session::has('flash'))
         <notifications :show-alert=true alert-type="success" alert-message="{{session('flash')}}"></notifications>       
    @endif
      </div>
    @include('partials.footer')
</div>

<!--   Core JS Files   -->
<script src="{{url('js/jquery.min.js')}}" type="text/javascript"></script>
{{--  <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>  --}}

<script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/material.min.js')}}"></script>
<script src="{{url('js/material-kit.js')}}" type="text/javascript"></script>
<script src="{{mix('js/app.js')}}"></script>   



@yield('scripts')
</body>

</html>
