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
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Address</h3>
                        <p>{!! isset($config) ? $config['address'] : '' !!}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://1234567920">{!! isset($config) ? $config['phone'] : '' !!}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:info@yoursite.com">{!! isset($config) ? $config['email'] : '' !!}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#">{!! isset($config) ? $config['website'] : '' !!}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section" id="Vue_component_wrapper">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                    <h2>Contact Us</h2>
                    <p class="mb-4" v-text="SuccessMessge"></p>
                    <form @submit.prevent="SubmitContact($event)">
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="FormData.firstname" placeholder="First Name">
                            <p class="text-danger" v-text="error.get('firstname')"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  v-model="FormData.lastname" placeholder="Last Name">
                            <p class="text-danger" v-text="error.get('lastname')"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="FormData.phone" placeholder="Phone">
                            <p class="text-danger" v-text="error.get('phone')"></p>
                        </div>
                        <div class="form-group">
                            <input type="text"  v-model="FormData.subject" class="form-control" placeholder="Subject">
                            <p class="text-danger" v-text="error.get('subject')"></p>
                        </div>
                        <div class="form-group">
                            <textarea v-model="FormData.message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            <p class="text-danger" v-text="error.get('message')"></p>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div id="map">
                        {!! isset($config) ? $config['google_map_location'] : '' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script>
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                app_url: baseURL,
                FormData: {
                    firstname: '',
                    lastname: '',
                    phone: '',
                    subject: '',
                    message: '',
                },
                SuccessMessge: '',
                error : new Errors(),
            },
            methods: {
                SubmitContact: function () {
                    const _this = this;
                    let URL = this.app_url + '/contactform/add';
                    _this.error.record([]);
                    $.ajax({
                        url: URL,
                        type: "post",
                        data: {
                            data: _this.FormData,
                        },
                        success: function (response) {
                            if (parseInt(response.status) === 2000) {
                                _this.SuccessMessge = response.msg;
                                _this.FormData.firstname = '';
                                _this.FormData.lastname = '';
                                _this.FormData.phone = '';
                                _this.FormData.subject = '';
                                _this.FormData.message = '';
                            }else if (parseInt(response.status) === 3000) {
                                _this.error.record(response.errors);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            _this.HttpRequest = false;
                            console.log(textStatus, errorThrown);
                        }
                    });
                },
            },
        });
    </script>
@endsection
