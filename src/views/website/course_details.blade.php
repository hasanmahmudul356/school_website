@php
    $blade_url = '';
    if (view()->exists('vendor.school_website')) {
    $blade_url = 'vendor.school_website';
    } else {
    $blade_url = 'school_website::';
    }
@endphp
@extends($blade_url.'website.layouts.master')
@section('style')
    <style>
        .img.align-self-stretch {
            background-image: url(http://localhost/edudesk_package/public/img/blankavatar.png);
        }

        /*  bhoechie tab */
        div.bhoechie-tab-container {
            z-index: 10;
            background-color: #ffffff;
            padding: 0 !important;
            border-radius: 4px;
            -moz-border-radius: 4px;
            border: 1px solid #ddd;
            margin-top: 20px;
            margin-left: 50px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
        }

        div.bhoechie-tab-menu {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group {
            margin-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group > a {
            margin-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group > a .glyphicon,
        div.bhoechie-tab-menu div.list-group > a .fa {
            color: #5A55A3;
        }

        div.bhoechie-tab-menu div.list-group > a:first-child {
            border-top-right-radius: 0;
            -moz-border-top-right-radius: 0;
        }

        div.bhoechie-tab-menu div.list-group > a:last-child {
            border-bottom-right-radius: 0;
            -moz-border-bottom-right-radius: 0;
        }

        div.bhoechie-tab-menu div.list-group > a.active,
        div.bhoechie-tab-menu div.list-group > a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group > a.active .fa {
            background-color: #5A55A3;
            background-image: #5A55A3;
            color: #ffffff;
        }

        div.bhoechie-tab-menu div.list-group > a.active:after {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #5A55A3;
        }

        div.bhoechie-tab-content {
            background-color: #ffffff;
            /* border: 1px solid #eeeeee; */
            padding-left: 20px;
            padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
            display: none;
        }
    </style>
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2"
             style="">
        <div class="overlay" style="background: url('{{env('PUBLIC_PATH')}}/img/backend/config/{{isset($config) ? $config['tisibanner'] : ''}}');"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{$faculty->department_name}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{Request::url()}}">Home <i
                                        class="ion-ios-arrow-forward"></i></a></span> <span>{{$faculty->department_name}}<i
                                    class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section style="margin: 50px 0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 ftco-animate">
                    <div class="row">
                        <div class=" col-md-3 bhoechie-tab-menu text-center">
                            <div class="list-group">
                                <a href="#" class="list-group-item active text-center">
                                    <h4 class="fa fa-eye"></h4><br/>Overview
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-list"></h4><br/>Feature
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-crosshairs"></h4><br/>Scope
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-file"></h4><br/>Subject
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-angle-left"></h4><br/>Lab Information
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-angle-left"></h4><br/>Fee Structure
                                </a>
                                <a href="#" class="list-group-item text-center">
                                    <h4 class="fa fa-angle-left"></h4><br/>Duration
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 bhoechie-tab">
                            <!-- flight section -->
                            <div class="bhoechie-tab-content active">
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->overview !!}</p>
                            </div>
                            <!-- train section -->
                            <div class="bhoechie-tab-content">
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->feature !!}</p>
                            </div>
                            <div class="bhoechie-tab-content">
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->scope !!}</p>
                            </div>
                            <div class="bhoechie-tab-content">
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->subject !!}</p>
                            </div>
                            <div class="bhoechie-tab-content">
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->labinfo !!}</p>
                            </div>
                            <div class="bhoechie-tab-content">
                                <h3 style="margin-top: 0;color:#55518a">{!! $faculty->fees !!}</h3>
                                <p style="margin-top: 0;color:#55518a">{!! $faculty->fees_structure !!}</p>
                            </div>
                            <div class="bhoechie-tab-content">
                                <h3 style="margin-top: 0;color:#55518a">{!! $faculty->duration !!}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('script')
    <script>
        $(document).ready(function () {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        });
    </script>
@stop
