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
                    <h1 class="mb-2 bread">Certified Teachers</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <a href="{{Request::url()}}"><span>Teachers <i class="ion-ios-arrow-forward"></i></span></a></p>
                </div>
            </div>
        </div>
    </section>
    @php
        $teachers = DB::table('teacher')->leftJoin('teacher_socials', 'teacher.teacher_id','=','teacher_socials.teacher_id')->select('teacher_socials.*','teacher.*','teacher.teacher_id')->get()
    @endphp

    @if (isset($teachers) && count($teachers) > 0)
        <section class="ftco-section ftco-no-pb">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>Certified</span> Teachers</h2>
                        <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                    </div>
                </div>
                <div class="row items-container">
                    @foreach ($teachers as $key => $teacher)
                        <div class="col-md-6 col-lg-3 ftco-animate masonry-item all {{$teacher->work_department}}">
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
@stop
@section('script')
    <script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/js/isotop.js"></script>
    <script>
        var items_container = jQuery('.items-container');
        var filters = jQuery('.filters');
        try{
            items_container.imagesLoaded( function() {
                items_container.isotope({
                    itemSelector: '.masonry-item',
                    sortBy: 'random'
                });
            })
        } catch(err) {
        }
        try{
            filters.on( "click", "li", function() {
                var filterValue = $(this).attr('data-filter');
                items_container.isotope({ filter: filterValue });
            });
        } catch(err) {
        }
    </script>
@stop
