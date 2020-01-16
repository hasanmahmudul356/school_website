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
                    <h1 class="mb-2 bread">Our Courses</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    @php
        $course_data = DB::table('manage_department')->get()->toArray();
        $courses = collect($course_data)->unique('department_code')
    @endphp
    @if (isset($courses) && count($courses) > 0)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>Our</span> Courses</h2>
                        <p>
                            {{isset($config) ? $config['course_heading'] : ''}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-6 course d-lg-flex ftco-animate">
                            @php
                                if(File::exists(public_path('/img/backend/department/'.$course->id.'.jpg'))){
                                    $image = env('PUBLIC_PATH').'/img/backend/department/'.$course->id.'.jpg';
                                }else{
                                    $image = env('PUBLIC_PATH').'/vendor/front_assets/images/course-1.jpg';
                                }
                            @endphp

                            <div class="img" style="background-image: url({{$image}});"></div>
                            <div class="text bg-light p-4">
                                <h3><a href="{{url('courses')}}/{{$course->department_code}}">{{isset($course->department_name) ? $course->department_name : ''}}</a></h3>
                                <p class="subheading"><span>Course Code:</span>{{isset($course->department_code) ? $course->department_code : ''}}</p>
                                <p>{{isset($course->description) ? $course->description : ''}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@stop
