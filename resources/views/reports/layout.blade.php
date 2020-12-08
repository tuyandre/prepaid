<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <style>
        @yield('style')
    </style>

</head>
<body>
<div id="app">
    <div class="container" style="margin-top: 20px">
        <div class="row">


            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
