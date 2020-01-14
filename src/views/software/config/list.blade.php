@extends('admin.index')
@section('Title','Faculty List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/faculty/list')
@section('breadcrumbs_title','Faculty List')

@section('content')
    <div class="container">
        <h2>Config List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('website_configs/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Item</a>
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
                            <th>id</th>
                            <th>type</th>
                            <th>name</th>
                            <th>Display Name</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($data_list as $key => $config)
                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$config->id}}</td>
                                <td>{{$config->type}}</td>
                                <td>{{$config->name}}</td>
                                <td>{{$config->display_name}}</td>
                                <td>{{$config->value}}</td>
                                <td>
                                    <a href="{{url('website_configs/edit')}}/{{$config->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('website_configs/delete')}}/{{$config->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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