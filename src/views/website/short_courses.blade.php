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
        <div class="overlay" style="background: url('{{env('PUBLIC_PATH')}}/img/backend/config/{{isset($config) ? $config['tisibanner'] : ''}}');"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{isset($config_head) ? $config_head['short_courses'] : ''}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{isset($config_head) ? $config_head['short_courses'] : ''}} <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    @php
        $courses = Tmss\School_website\Http\Models\Faculty::where('type', 2)->get();
    @endphp
    @if (isset($courses) && count($courses) > 0)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['short_courses'] : ''}}</h2>
                        <p>{{isset($config) ? $config['short_courses'] : ''}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($courses as $facul)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="pricing-entry bg-light pb-4 text-center">
                                @php
                                    if(File::exists(public_path('/img/backend/faculty/'.$facul['id'].'.jpg'))){
                                        $image = env('PUBLIC_PATH').'/img/backend/faculty/'.$facul['id'].'.jpg';
                                    }else{
                                        $image = env('PUBLIC_PATH').'/vendor/front_assets/images/course-1.jpg';
                                    }
                                @endphp
                                <div>
                                    <h3 class="mb-3">{{isset($facul['coursecode']) ? $facul['coursecode'] : ''}}</h3>
                                    <p><span class="price">{{$facul['fees']}}</span>
                                        <span class="per">/{{$facul['duration']}}</span>
                                    </p>
                                </div>
                                <div class="img" style="background-image: url({{$image}})"></div>
                                <div class="px-4">
                                    <p>{!! substr($facul['overview'],0,100) !!}</p>
                                </div>
                                <p class="button text-center" style="margin-top: 10px">
                                    <a href="{{url('short_course')}}/{{$facul['id']}}" class="btn btn-primary px-4 py-3">Take A Course</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@stop
