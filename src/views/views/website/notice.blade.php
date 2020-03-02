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
            if(File::exists(public_path('/img/backend/page/'.$page->id.'.jpg'))){
                $image = env('PUBLIC_PATH').'/img/backend/page/'.$page->id.'.jpg';
            }else{
                $image = env('PUBLIC_PATH').'/img/backend/config/'.$config['tisibanner'];
            }
        @endphp
        <div class="overlay" style="background: url('{{$image}}');"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{$page->title}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$page->title}}</span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section">
        <div class="container">
            @php
            $notices = DB::table('notice_board')->where('to', 'Website')->get();
            @endphp
            <h2>{{isset($config_head) ? $config_head['notice_board'] : ''}}</h2>
            @foreach ($notices as $notice)
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notice->notice_id}}">{{$notice->notice_title}}</a>
                            </h4>
                        </div>
                        <div id="collapse{{$notice->notice_id}}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <h1>{{$notice->notice_title}}</h1>
                                <hr>
                                <h3><strong>Subject: </strong>{{$notice->notice_subject}}</h3>
                                <p><strong>Details: </strong>{{$notice->Notice}}</p>
                                <p><strong>Attachment : </strong><a target="_blank" href="{{env('PUBLIC_PATH')}}/img/backend/noticeboard/{{$notice->notice_title}}">Download</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@stop
