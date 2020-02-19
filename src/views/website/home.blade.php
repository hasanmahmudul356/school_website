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
        $slides = Tmss\School_website\Http\Models\Slides::take(10)->orderBy('id', 'DESC')->get();
        $slides = Tmss\School_website\Http\Models\Slides::take(10)->orderBy('id', 'DESC')->get();
        $facilities = Tmss\School_website\Http\Models\Facility::take(10)->orderBy('id', 'DESC')->get();
        $teachers = App\teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id', '=', 'teacher_socials.teacher_id')->where('is_homepage', 1)->select('teacher_socials.*', 'teacher.*', 'teacher.teacher_id')->get();
        $offers = Tmss\School_website\Http\Models\Offers::take(10)->get();
        $testimonials = Tmss\School_website\Http\Models\Testimonial::take(10)->get();
        $courses = App\manage_department_model::all()->toArray();
        $courses = collect($courses)->unique('department_code');
        $news = Tmss\School_website\Http\Models\News::take(10)->orderBy('id', 'DESC')->get();
        $photogallery = Tmss\School_website\Http\Models\Photogallery::take(4)->orderBy('id', 'DESC')->get();
        $socialmedias = Tmss\School_website\Http\Models\Socialmedia::take(4)->orderBy('id', 'DESC')->get();
        $pages = Tmss\School_website\Http\Models\Page::all()->toArray();
        $faculty = Tmss\School_website\Http\Models\Faculty::where('type', 2)->get();
    @endphp
    @if (isset($slides) && count($slides) > 0)
        <section class="home-slider owl-carousel">
            @foreach($slides as $slide)
                <div class="slider-item"
                     style="background-image:url({{env('PUBLIC_PATH')}}/img/backend/slide/{{$slide->id.'.jpg'}});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text align-items-center justify-content-center"
                             data-scrollax-parent="true">
                            <div class="col-md-8 text-center ftco-animate">
                                <h1 class="mb-4">{{$slide->title}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
    @if (isset($facilities) && count($facilities) > 0)
        <section class="ftco-services ftco-no-pb">
            <div class="container-wrap">
                <div class="row no-gutters">
                    @foreach ($facilities as $facility)
                        <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate"
                             style="background-color: {{$facility->colour}}">
                            <div class="block-6 d-block text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <i class="fa {{$facility->icon}}"></i>
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading">{{$facility->title}}</h3>
                                    <p>{{$facility->details}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (isset($offers) && count($offers) > 0)
        <section class="ftco-section ftco-no-pt ftc-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                        <div class="text px-4 ftco-animate">
                            <h2 class="mb-4">{!! isset($config_head) ? $config_head['welcome_message'] : '' !!}</h2>
                            <p>
                                {!! isset($config) ? $config['welcome_message'] : '' !!}
                            </p>
                            <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                        </div>
                    </div>
                    <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['what_we_offer'] : ''}}</h2>
                        <p>
                            {{isset($config) ? $config['what_we_offer'] : ''}}
                        </p>
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
    <section class="ftco-intro"
             style="background-image: url({{env('PUBLIC_PATH')}}/vendor/front_assets/images/bg_3.jpg);"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>{{isset($config_head) ? $config_head['teaching_style'] : ''}}</h2>
                    <p class="mb-0">
                        {{isset($config) ? $config['teaching_style'] : ''}}
                    </p>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <p class="mb-0"><a href="{{url('/')}}/page/courses" class="btn btn-secondary px-4 py-3">Take a
                            Course</a></p>
                </div>
            </div>
        </div>
    </section>
    @if (isset($teachers) && count($teachers) > 0)
        <section class="ftco-section ftco-no-pb">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>{{isset($config_head) ? $config_head['certified_teachers'] : ''}}</span>
                        </h2>
                        <p>{{isset($config) ? $config['certified_teachers'] : ''}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($teachers as $teacher)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="staff">
                                <div class="img-wrap d-flex align-items-stretch">
                                    @php
                                        if(File::exists(public_path('/img/backend/teacher_staff/'.$teacher->teacher_id.'.jpg'))){
                                            $image = env('PUBLIC_PATH').'/img/backend/teacher_staff/'.$teacher->teacher_id.'.jpg';
                                        }else{
                                            $image = env('PUBLIC_PATH').'/vendor/front_assets/images/course-1.jpg';
                                        }
                                    @endphp

                                    <div class="img align-self-stretch" style="background-image: url({{$image}})"></div>
                                </div>

                                <div class="text pt-3 text-center">
                                    <h3>{{$teacher->teacher_name}}</h3>
                                    <span class="position mb-2">{{$teacher->work_department}}</span>
                                    <div class="faded">
                                        @if (isset($teacher->teachers_say) && $teacher->teachers_say)
                                            <p>{{$teacher->teachers_say}}</p>
                                        @endif
                                        <ul class="ftco-social text-center">
                                            <li class="ftco-animate">
                                                <a href="{{isset($teacher->twitter) && $teacher->twitter ? $teacher->twitter : ''}}">
                                                    <span class="icon-twitter"></span>
                                                </a>
                                            </li>
                                            <li class="ftco-animate">
                                                <a href="{{isset($teacher->facebook) && $teacher->facebook ? $teacher->facebook : ''}}">
                                                    <span class="icon-facebook"></span></a>
                                            </li>
                                            <li class="ftco-animate">
                                                <a href="{{isset($teacher->youtube) && $teacher->youtube ? $teacher->youtube : ''}}">
                                                    <span class="icon-google-plus"></span>
                                                </a>
                                            </li>
                                            <li class="ftco-animate">
                                                <a href="{{isset($teacher->instagram) && $teacher->instagram ? $teacher->instagram : ''}}">
                                                    <span class="icon-instagram"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (isset($courses) && count($courses) > 0)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['our_courses'] : ''}}</h2>
                        <p>{{isset($config) ? $config['our_courses'] : ''}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-6 course d-lg-flex ftco-animate">
                            @php
                                if(File::exists(public_path('/img/backend/department/'.$course['id'].'.jpg'))){
                                    $image = env('PUBLIC_PATH').'/img/backend/department/'.$course['id'].'.jpg';
                                }else{
                                    $image = env('PUBLIC_PATH').'/vendor/front_assets/images/course-1.jpg';
                                }
                            @endphp

                            <div class="img" style="background-image: url({{$image}});"></div>
                            <div class="text bg-light p-4">
                                <h3>
                                    <a href="{{url('courses')}}/{{$course['department_code']}}">{{isset($course['department_name']) ? $course['department_name'] : ''}}</a>
                                </h3>
                                <p class="subheading">
                                    <span>Course Code:</span>{{isset($course['department_code']) ? $course['department_code'] : ''}}
                                </p>
                                <p>{{isset($course['description']) ? $course['description'] : ''}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="ftco-section ftco-counter img" id="section-counter"
             style="background-image: url({{env('PUBLIC_PATH')}}/vendor/front_assets/images/bg_4.jpg);"
             data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
                    <h2 class="mb-4">{{isset($config_head) ? $config_head['years_of_experience'] : ''}}</h2>
                    <p>{{isset($config) ? $config['years_of_experience'] : ''}}
                    </p>
                </div>
            </div>
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="{{App\teacher_model::get()->count()}}">0</strong>
                                    <span>Teachers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="{{App\students::get()->count()}}">0</strong>
                                    <span>Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="{{App\parents_info_model::get()->count()}}">0</strong>
                                    <span>Parents</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="7">0</strong>
                                    <span>Publications</span>
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
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['parents_comment'] : ''}}</h2>
                        <p>{{isset($config) ? $config['parents_comment'] : ''}}
                            </p>
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
    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"
             style="background-image: url({{env('PUBLIC_PATH')}}/vendor/front_assets/images/bg_5.jpg);">
        <div class="container" id="Vue_component_wrapper">
            <div class="row justify-content-end">
                <div class="col-md-6 py-5 px-md-5 bg-primary">
                    <div class="heading-section heading-section-white">
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['request_a_quote'] : ''}}</h2>
                        <p>{{isset($config) ? $config['request_a_quote'] : ''}}</p>
                        <p class="mb-4" v-text="SuccessMessge"></p>
                    </div>
                    <form class="appointment-form" @submit.prevent="SubmitContact($event)">
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input placeholder="First Name" v-model="FormData.firstname" type="text"
                                       class="form-control">
                                <p class="text-danger" v-text="error.get('firstname')"></p>
                            </div>
                            <div class="form-group ml-md-4">
                                <input placeholder="Last Name" type="text" class="form-control"
                                       v-model="FormData.lastname">
                                <p class="text-danger" v-text="error.get('lastname')"></p>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input placeholder="Phone" type="text" class="form-control" v-model="FormData.phone">
                                <p class="text-danger" v-text="error.get('phone')"></p>
                            </div>
                            <div class="form-group ml-md-4">
                                <input placeholder="Subject" type="text" class="form-control"
                                       v-model="FormData.subject">
                                <p class="text-danger" v-text="error.get('subject')"></p>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" type="text"
                                          v-model="FormData.message"></textarea>
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
    @if (isset($faculty) && count($faculty) > 0)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4">{{isset($config_head) ? $config_head['take_a_course'] : ''}}</h2>
                        <p>{{isset($config) ? $config['take_a_course'] : ''}}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($faculty as $facul)
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
    @if (isset($news) && count($news) > 0)
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
