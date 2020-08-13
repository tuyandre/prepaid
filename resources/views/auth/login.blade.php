<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Prepaid</title>
    {{--  <link rel="icon" href="{{ asset('data/assets/logo.jpg') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/authLayout.css') }}" rel="stylesheet">  --}}
    
    <link rel="icon" href="https://prepaidproject.herokuapp.com/data/assets/logo.jpg">
    <link href="https://prepaidproject.herokuapp.com/css/authLayout.css" rel="stylesheet">
    <link href="https://prepaidproject.herokuapp.com/css/app.css" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}"> </head>
<body style="background: black;">
<div id="app">
    <div class="bg-auth"></div>
    <div class="content">
        <login></login>

    </div>


</div>
<!-- built files will be auto injected -->
<!-- ./wrapper -->
{{--  <script src="{{ asset('js/app.js') }}" defer></script>  --}}
<script src="https://prepaidproject.herokuapp.com/js/app.js" defer></script>
</body>
</html>
