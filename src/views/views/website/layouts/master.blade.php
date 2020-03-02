<!DOCTYPE html>
<html lang="en">
<head>
    <title>TMSS Institute of Science and ICT (TISI)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    class Errors{
        constructor(){
            this.errors = {};
            this.arr_errors = [];
        }
        get(field){
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }
        record(errors){
            this.errors = errors;
        }
    }
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
<script>
    $.ajaxSetup({data : {_token: '{{csrf_token()}}'},});
    var path = document.location;
    var target = $('ul.nav.navbar-nav.navbar-right li a[href$="' + path + '"]');
    target.parent().addClass("active");
</script>

<script>
    new Vue({
        el: '#Vue_component_subscriber',
        data: {
            app_url: baseURL,
            FormData: {
                email: '',
            },
            SuccessMessge: '',
            error : new Errors(),
        },
        methods: {
            SubmitContact: function () {
                const _this = this;
                let URL = this.app_url + '/subscribe/add';
                _this.error.record([]);
                $.ajax({
                    url: URL,
                    type: "post",
                    data: {
                        data: _this.FormData,
                    },
                    success: function (response) {
                        if (parseInt(response.status) === 2000) {
                            _this.SuccessMessge = response.msg;
                            _this.FormData.email = '';
                        }else if (parseInt(response.status) === 3000) {
                            _this.error.record(response.errors);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        _this.HttpRequest = false;
                        console.log(textStatus, errorThrown);
                    }
                });
            },
        },
    });
</script>
@yield('script')
</body>
</html>