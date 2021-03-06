<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Prepaid</title>

      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminHeader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css')}}">
    @yield('css')

    <meta name="csrf-token" content="{{ csrf_token() }}"> </head>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper" id="app">
        <div class="content">
          @include('shared.header')
          @include('shared.sidebar')
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            @yield('content')

            {{--  <customer-main></customer-main>  --}}

          </div>
            @include('shared.footer')
        </div>
    </div>
    <!-- built files will be auto injected -->
    <!-- ./wrapper -->
      <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
