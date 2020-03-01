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
    </style>
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2" style="">

        @php
            $image = env('PUBLIC_PATH').'/img/backend/config/'.$config['tisibanner'];
        @endphp


        <div class="overlay" style="background: url('{{$image}}');"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{$news->topic}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$news->topic}}</span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container content_area">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$news->topic}}</h2>
                    <hr>
                </div>
                <div class="col-md-12 news_image">
                    <img style="max-height: 400px; max-width: 100%; margin-bottom: 20px; padding: 5px" src="{{env('PUBLIC_PATH')}}/img/backend/news/{{$news->id.'.jpg'}}">
                </div>
                <div class="col-md-12 news_details">
                    <hr>
                    <div>{!! $news->details !!}</div>
                </div>
            </div>
        </div>
    </section>
@stop
