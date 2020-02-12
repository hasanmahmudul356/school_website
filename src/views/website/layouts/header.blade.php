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

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="header_logo"><a href="{{url('/')}}" target="_blank"><img src="{{env('PUBLIC_PATH')}}/img/backend/config/{{isset($config) ? $config['headerlogo'] : ''}}"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Cache::has('menus'))
                    @foreach (Cache::get('menus') as $menu)
                        @if (isset($menu['submenu']) && count($menu['submenu']) > 0)
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$menu['title']}}</a>
                                <ul class="dropdown-menu multi-level">
                                    @foreach($menu['submenu'] as $submenu)
                                        @if (isset($submenu['subsubmenu']) && count($submenu['subsubmenu']) > 0)
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$submenu['title']}}</a>
                                                <ul class="dropdown-menu">
                                                    @foreach($submenu['subsubmenu'] as $subsubmenu)
                                                    <li><a href="{{url('/page')}}/{{$submenu['url']}}">{{$subsubmenu['title']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{url('/page')}}/{{$submenu['url']}}">{{$submenu['title']}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{url('/page')}}/{{$menu['url']}}">{{$menu['title']}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
