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
        $offers = DB::table('offers')->take(10)->get();
        $testimonials = DB::table('testimonials')->take(10)->get();
        $photogallery = DB::table('photogallery')->take(4)->orderBy('id','DESC')->get();
    @endphp
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{env('PUBLIC_PATH')}}/vendor/front_assets/images/bg_2.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    @if (isset($offers) && count($offers) > 0)
        <section class="ftco-section ftco-no-pt ftc-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                        <div class="text px-4 ftco-animate">
                            <h2 class="mb-4">Welcome to Kiddos Learning School</h2>
                            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from
                                it would have been rewritten a thousand times and everything that was left from its
                                origin would be the word.</p>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean. A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. And if she hasn’t been rewritten, then they are still using
                                her.</p>
                            <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                        </div>
                    </div>
                    <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                        <h2 class="mb-4">What We Offer</h2>
                        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                            would have been rewritten a thousand times and everything that was left from its origin
                            would be the word.</p>
                        <div class="row mt-5">
                            @foreach ($offers as $offers)
                                <div class="col-lg-6">
                                    <div class="services-2 d-flex">
                                        <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                                            <span class="fa {{$offers->icon}}"></span></div>
                                        <div class="text">
                                            <h3>{{$offers->title}}</h3>
                                            <p>{{$offers->details}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
                    <h2 class="mb-4"><span>20 Years of</span> Experience</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="18">0</strong>
                                    <span>Certified Teachers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="351">0</strong>
                                    <span>Successful Kids</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="564">0</strong>
                                    <span>Happy Parents</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="300">0</strong>
                                    <span>Awards Won</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset($testimonials) && count($testimonials) > 0)
        <section class="ftco-section testimony-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>What Parents</span> Says About Us</h2>
                        <p>Separated they live in. A small river named Duden flows by their place and supplies it with
                            the
                            necessary regelialia. It is a paradisematic country</p>
                    </div>
                </div>
                <div class="row ftco-animate justify-content-center">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <div class="testimony-wrap d-flex">
                                        <div class="user-img mr-4"
                                             style="background-image:url({{env('PUBLIC_PATH')}}/img/backend/testimonial/{{$testimonial->id.'.jpg'}});">
                                        </div>
                                        <div class="text ml-2 bg-light">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                              <i class="icon-quote-left"></i>
                                            </span>
                                            <p>{{$testimonial->details}}</p>
                                            <p class="name">{{$testimonial->title}}</p>
                                            <span class="position">{{$testimonial->relation}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url({{env('PUBLIC_PATH')}}/vendor/front_assets/images/bg_5.jpg);" >
        <div class="container" id="Vue_component_wrapper">
            <div class="row justify-content-end">
                <div class="col-md-6 py-5 px-md-5 bg-primary">
                    <div class="heading-section heading-section-white">
                        <h2 class="mb-4">Request A Quote</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <p class="mb-4" v-text="SuccessMessge"></p>
                    </div>
                    <form class="appointment-form" @submit.prevent="SubmitContact($event)">
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input placeholder="First Name" v-model="FormData.firstname" type="text" class="form-control">
                                <p class="text-danger" v-text="error.get('firstname')"></p>
                            </div>
                            <div class="form-group ml-md-4">
                                <input placeholder="Last Name" type="text" class="form-control"  v-model="FormData.lastname">
                                <p class="text-danger" v-text="error.get('lastname')"></p>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input placeholder="Phone" type="text" class="form-control" v-model="FormData.phone">
                                <p class="text-danger" v-text="error.get('phone')"></p>
                            </div>
                            <div class="form-group ml-md-4">
                                <input placeholder="Subject" type="text" class="form-control" v-model="FormData.subject">
                                <p class="text-danger" v-text="error.get('subject')"></p>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" type="text" v-model="FormData.message"></textarea>
                                <p class="text-danger" v-text="error.get('message')"></p>
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if (isset($photogallery) && count($photogallery) > 0)
        <section class="ftco-gallery">
            <div class="container-wrap">
                <div class="row no-gutters">
                    @foreach($photogallery as $photogallery)
                        <div class="col-md-3 ftco-animate">
                            <a href="{{env('PUBLIC_PATH')}}/img/backend/photogallery/{{$photogallery->id.'.jpg'}}"
                               class="gallery image-popup img d-flex align-items-center"
                               style="background-image: url({{env('PUBLIC_PATH')}}/img/backend/photogallery/{{$photogallery->id.'.jpg'}}">
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="icon-instagram"></span>
                                </div>
                            </a>
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