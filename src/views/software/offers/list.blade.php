@extends('admin.index')
@section('Title','offer List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/offers/list')
@section('breadcrumbs_title','offers List')

@section('content')
    <div class="container">
        <h2>offers List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('offers/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add offers</a>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $offers)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$offers->title}}</td>
                                <td>{{$offers->details}}</td>
                                <td>
                                    <i class="fa {{$offers->icon}}"></i>
                                </td>
                                <td>
                                    <a href="{{url('offers/edit')}}/{{$offers->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('offers/delete')}}/{{$offers->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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