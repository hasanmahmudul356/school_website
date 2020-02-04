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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav logo">
                <li>
                    <a href="{{url('/')}}"><img src="{{env('PUBLIC_PATH')}}/img/backend/config/{{isset($config) ? $config['headerlogo'] : ''}}"></a>
                </li>
            </ul>
            @php
                $menus = \Tmss\School_website\Http\Models\Page::where(['is_menu'=> 1,'position'=> 'main_menu','parent'=> 0])->orderBy('sort','ASC')->with('submenu')->get();
            @endphp
            <ul class="nav navbar-nav navbar-right">
                @if (count($menus) > 0)
                    @foreach($menus as $menu)
                        @if (isset($menu->submenu) && count($menu->submenu) > 0)
                            <li class="dropdown">
                                <a href="{{url('/page')}}/{{$menu->url}}" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">{{$menu->title}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($menu->submenu as $sub_menu)
                                        <li><a href="{{url('/page')}}/{{$sub_menu->url}}">{{$sub_menu->title}}</a></li>
                                        @endforeach
                                    </ul>
                            </li>
                        @else
                            <li><a href="{{url('/page')}}/{{$menu->url}}">{{$menu->title}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- END nav -->
