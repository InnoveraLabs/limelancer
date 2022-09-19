<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="keywords" content="limelancer, seo, design, coding, logo design, facebook marketing, programming, photoshop, freelancer, freelancing, online jobs, earn money online" />
    <meta name="description" content="Limelancer | Social marketplace for creative professionals" />
    <meta name="author" content="limelancer">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">

    <!-- Custom css code from modified in admin panel --->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800'rel='stylesheet'type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/sweat_alert.css') }}" >
    <script type="text/javascript" src="{{ asset('js/admin-js/ie.js') }}"></script>
    <script src="{{ asset('js/admin-js/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


</head>
<body>
<!--start header Area-->
@include('partials.adminheader')
<!--End header Area-->

<!-- Start Dynamic Content -->
@yield('content')
<!-- end Dynamic Content -->
<!--start footer Area-->
@include('partials.adminfooter')


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/admin-js/jquery.easypiechart.js')}}"></script>
<script src="{{asset('js/admin-js/jquery.sparkline.js')}}"></script>
<script src="{{asset('js/admin-js/chart-main.js')}}"></script>
<script src="{{asset('js/admin-js/popper.min.js')}}"></script>
<script src="{{asset('js/admin-js/plugins.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@yield('scripts')
</body>
</html>
