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
            <div class="row d-flex mb-10 contact-info">
                @php
                  $academic_syllabus = DB::table('academic_syllebus')->get()
                @endphp
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                        <tr>
                            <th>{{trans('app.class')}}</th>
                            <th>{{trans('app.subject')}}</th>
                            <th>{{trans('app.department')}}</th>
                            <th>{{trans('app.file_name')}}</th>
                            <th>{{trans('app.file_preview')}}</th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach($academic_syllabus as $academic_syllabus_list)
                            <tr class="gradeX">
                                <td>{{$academic_syllabus_list->class_name}}</td>
                                <td>{{$academic_syllabus_list->subject}}</td>
                                <td>{{$academic_syllabus_list->department}}</td>
                                <td>{{$academic_syllabus_list->class_name."_".$academic_syllabus_list->subject.".pdf"}}</td>
                                <td >
                                    <a style="font-size: 25px;color: red;margin-left: 40%;" target="_blank" href="{{env('SOFTWARE_PUBLIC_PATH')}}/img/backend/academic_syllabus/{{$academic_syllabus_list->class_name.'_'.$academic_syllabus_list->subject.'.pdf'}}">
                                        <i  class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
