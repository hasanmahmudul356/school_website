@extends('admin.index')
@section('Title','Page List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/page/list')
@section('breadcrumbs_title','Page List')
@section('style')
    <style>
        tr.sort_product-each.ui-sortable-handle {
            cursor: all-scroll;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <h2>Page List</h2>
        <p id="message" class="text-success"></p>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('page/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Page</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                    <h5 style="float: right" class="btn btn-xs btn-success" onclick="UpdateSort()">Update Sort</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">

                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Template</th>
                            <th>Is Menu</th>
                            <th>Menu Position</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody id="sortable">

                        @foreach($data_list as $key => $page)

                            <tr class="sort_product-each" data_product_id="{{$page->id}}" >
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/page/{{$page->id.'.jpg'}}"></td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->template}}</td>
                                <td>
{{--                                    {{$page->is_menu}}--}}
                                <?php
                                    if (isset($page) && $page->is_menu = '1' ){
                                        echo 'Yes';
                                    }else{
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td>{{$page->position}}</td>
                                <td>
                                    <a id="{{$page->id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('page/edit')}}/{{$page->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('page/delete')}}/{{$page->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        let NewArray = [];
        jQuery(function () {
            jQuery("#sortable").sortable({
                update: function (event, ui) {
                    NewArray = [];
                    let product_list = jQuery(".sort_product-each");
                    product_list.each(function (index, value) {
                        let rv = {
                            id: jQuery(value).attr("data_product_id"),
                            sort_id: (product_list.length - index)
                        };
                        NewArray.push(rv)
                    });
                }
            });
        });

        function UpdateSort() {
            let data = [];
            NewArray = [];
            let product_list = jQuery(".sort_product-each");
            product_list.each(function (index, value) {
                let rv = {
                    id: jQuery(value).attr("data_product_id"),
                    sort_id: (index + 1)
                };
                NewArray.push(rv)
            });
            jQuery.ajax({
                type: "POST",
                url: '{{url('/')}}/page/sort/update',
                data: {
                    all_data: NewArray,
                    _token : '{{csrf_token()}}'
                },
                success: function (response) {
                    if (parseInt(response.status) === 2000) {
                        $('#message').text(response.msg);
                    } else {
                        Toster(messageType(response.status_code), response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

    </script>
@stop