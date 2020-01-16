@extends('admin.index')
@section('Title','Page List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/page/list')
@section('breadcrumbs_title','Page List')

@section('content')
    <div class="container">
        <h2>Page List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('page/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Page</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
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


                        <tbody>

                        @foreach($data_list as $key => $page)

                            <tr class="gradeX">
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