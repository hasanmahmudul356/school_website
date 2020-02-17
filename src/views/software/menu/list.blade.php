@extends('admin.index')
@section('Title','Page List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/page/list')
@section('breadcrumbs_title','Page List')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/vendor/front_assets/css/sortable.css">
@stop
@section('content')
    <div class="container">
        <h2>Menu Update</h2>
        <button class="btn btn-success" onclick="updateOutput()">Update</button>
        <p id="message" class="text-success"></p>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach($data as $menu)
                                @if (count($menu['submenu']) > 0)
                                    <li class="dd-item" data-id="{{$menu['id']}}">
                                        <div class="dd-handle">{{$menu['title']}}</div>
                                        <ol class="dd-list">
                                            @foreach($menu['submenu'] as $submenu)
                                                @if (count($submenu['subsubmenu']) > 0)
                                                    <li class="dd-item" data-id="{{$submenu['id']}}">
                                                        <div class="dd-handle">{{$submenu['title']}}</div>
                                                        <ol class="dd-list">
                                                            @foreach($submenu['subsubmenu'] as $subsubmenu)
                                                            <li class="dd-item" data-id="{{$subsubmenu['id']}}">
                                                                <div class="dd-handle">{{$subsubmenu['title']}}</div>
                                                            </li>
                                                            @endforeach
                                                        </ol>
                                                    </li>
                                                @else
                                                    <li class="dd-item" data-id="{{$submenu['id']}}"><div class="dd-handle">{{$submenu['title']}}</div></li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </li>
                                @else
                                    <li class="dd-item" data-id="{{$menu['id']}}">
                                        <div class="dd-handle">{{$menu['title']}}</div>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://dbushell.com/Nestable/jquery.nestable.js"></script>
    <script>
        $('.dd').nestable();

        function updateOutput () {
            var serializedData = window.JSON.stringify($('.dd').nestable('serialize'));
            var data = JSON.parse(serializedData);
            $.ajax({
                url: '{{url('menu/update')}}',
                type: "post",
                data : {
                    data : data,
                    _token: '{{@csrf_token()}}',
                },
                success: function (response) {
                    if (parseInt(response.status) === 2000){
                        $('#message').text(response.msg);
                    }
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

    </script>
@stop