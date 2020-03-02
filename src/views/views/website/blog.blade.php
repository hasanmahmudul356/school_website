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
    @php
        $news = Tmss\School_website\Http\Models\News::take(10)->where('type', 1)->orderBy('id', 'DESC')->get();
    @endphp
    @if (isset($news) && count($news) > 0)
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
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>{{isset($config_head) ? $config_head['recent_news'] : ''}}</span></h2>
                        <p>{{isset($config) ? $config['recent_news'] : ''}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($news as $newsarticle)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="blog-single.html" class="block-20 d-flex align-items-end"
                                   style="background-image:url({{env('PUBLIC_PATH')}}/img/backend/news/{{$newsarticle->id.'.jpg'}});">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">27</span>
                                        <span class="mos">January</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text bg-white p-4">
                                    <h3 class="heading">
                                        <a href="#">{!! $newsarticle->topic !!}</a>
                                    </h3>
                                    <p>{!! $newsarticle->details !!}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto mb-0">
                                            <a href="#" class="mr-2">Admin 12</a>
                                            <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@stop
@section('script')
    <script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/vue/home.js"></script>
@stop
