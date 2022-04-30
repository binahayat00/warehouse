<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/font-awesome/css/font-awesome.css') }}"  rel="stylesheet"/>
    <link href="{{asset('fonts/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/font-awesome/css/solid.css') }}"  rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="sweetalert2.min.js"></script>
</head>
<body>
<div id="app">
    <div class="d-flex h-100">
        <sidebar></sidebar>
        <router-view></router-view>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active')
        });
        $(window).on('resize', function () {
            if ($(window).width() < 700) {
                $('#sidebar').addClass('active')
            }else {
                $('#sidebar').removeClass('active')
            }
        })

        // $("#file").on('change', function (arg) {
        //     var input = arg.target;
        //     var names = []
        //     for (var i = 0; i < input.files.length; i++) {
        //         names.push(input.files[i].name)
        //     }
        //     $("#table-body-request label:last").text(names);
        // });

    });
</script>

</html>
