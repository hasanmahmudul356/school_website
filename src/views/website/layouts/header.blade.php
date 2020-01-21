<div class="py-2 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-5 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text address">{{isset($config) ? $config['address'] : ''}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">{{isset($config) ? $config['email'] : ''}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{isset($config) ? $config['phone'] : ''}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <a href="{{url('/')}}"><img src="{{env('PUBLIC_PATH')}}/img/backend/config/{{isset($config) ? $config['headerlogo'] : ''}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @php
                    $menus = \Tmss\School_website\Http\Models\Page::where(['is_menu'=> 1,'position'=> 'main_menu','parent'=> 0])->orderBy('sort','ASC')->with('submenu')->get();
                @endphp
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link pl-0">Home</a></li>
                @if (count($menus) > 0)
                    @foreach($menus as $menu)
                        <li class="nav-item"><a href="{{url('/page')}}/{{$menu->url}}" class="nav-link dropbtn">{{$menu->title}}</a>
                            @if (isset($menu->submenu) && count($menu->submenu) > 0)
                                <ul>
                                    @foreach($menu->submenu as $sub_menu)
                                        <li class="sub-nav-item" style="list-style-type: none">
                                            <a href="{{url('/page')}}/{{$sub_menu->url}}" style="color: #000">{{$sub_menu->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
