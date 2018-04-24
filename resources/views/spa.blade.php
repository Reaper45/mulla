<?php
/**
 * Created by PhpStorm.
 * User: joram
 * Date: 4/23/18
 * Time: 11:47 AM
 */
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mulla Pay') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
</div>
<script>
    var user = "{{ auth()->id() }}"
    sessionStorage.setItem('mullaUserId', user)
</script>
<!-- Include the mula Express checkout library -->
<script type="text/javascript" src="https://beep2.cellulant.com:9001/CheckoutV2/checkout/mula-modal/bundle.js" charset="utf-8"></script>
</body>
</html>
