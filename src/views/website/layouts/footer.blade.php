<footer class="ftco-footer ftco-bg-dark ftco-section" style="clear:both; margin-top: 20px">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">{{isset($config) ? $config['footer_block1_head'] : ''}}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">
                                    {{isset($config) ? $config['address'] : ''}}
                                </span>
                            </li>
                            <li><a href="#">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">{{isset($config) ? $config['phone'] : ''}}
                                    </span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">
                                    {{isset($config) ? $config['email'] : ''}}
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">

                    <h2 class="ftco-heading-2">{{isset($config) ? $config['footer_block2_head'] : ''}}</h2>
                    <ul class="list-unstyled">
                        @php
                            $menus = DB::table('page')->where('is_menu', 1)->where('position', 'about_us_footer_menu')->orderBy('sort','ASC')->get();
                        @endphp
                        @if (count($menus) > 0)
                            @foreach($menus as $menu)
                                <li><a href="{{url('/page')}}/{{$menu->url}}" class=""><span class="ion-ios-arrow-round-forward mr-2"></span>{{$menu->title}}</a></li>
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">{{isset($config) ? $config['footer_block3_head'] : ''}}</h2>
                    <ul class="list-unstyled">
                        <?php
                        $courses = DB::table('manage_department')->get();
                        $course_list = $courses->unique('department_code');

                        ?>
                    @if (isset($course_list) && count($course_list) > 0)
                        @foreach($course_list as $course)
                            <li>
                                <a href="{{url('courses')}}/{{$course->department_code}}"><span class="ion-ios-arrow-round-forward mr-2"></span>{{isset($course->department_name) ? $course->department_name : ''}}</a>
                            </li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5" id="Vue_component_subscriber">
                    <h2 class="ftco-heading-2">{{isset($config) ? $config['footer_block4_head'] : ''}}</h2>
                    <p class="mb-4" v-text="SuccessMessge"></p>
                    <form method="post" @submit.prevent="SubmitContact($event)"
                          enctype="multipart/form-data" class="subscribe-form">
                        <div class="form-group">
                            <input placeholder="Enter email address" name="email" type="email" class="form-control" v-model="FormData.email">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
                @if (isset($socialmedias) && count($socialmedias) > 0)
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2 mb-0">{{isset($config) ? $config['footer_block5_head'] : ''}}</h2>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            @foreach($socialmedias as $socialmedia):
                            <li class="ftco-animate"><a target="_blank" href="{{$socialmedia->details}}"><span class="fa {{$socialmedia->icon}}"></span></a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>{!! isset($config) ? $config['copywright'] : '' !!}</p>
            </div>
        </div>
    </div>
</footer>