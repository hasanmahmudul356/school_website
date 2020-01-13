<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kiddos - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/animate.css">

    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/aos.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/ionicons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/flaticon.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/icomoon.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/style.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/custom_style.css">
    @yield('style')
</head>
<body >

@php
    $blade_url = '';
    if (view()->exists('vendor.school_website')) {
    $blade_url = 'vendor.school_website.';
    } else {
    $blade_url = 'school_website::';
    }
@endphp

@include($blade_url.'website.layouts.header')

@yield('content')

@include($blade_url.'website.layouts.footer')
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/vue/vue.js"></script>
<script>
    var baseURL = '{{url('/')}}';
</script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/popper.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/bootstrap.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.easing.1.3.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.waypoints.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.stellar.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/owl.carousel.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/aos.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/jquery.animateNumber.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/scrollax.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/main.js"></script>
<script>$.ajaxSetup({data : {_token: '{{csrf_token()}}'},});</script>
@yield('script')
</body>
</html>