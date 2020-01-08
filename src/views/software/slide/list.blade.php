@extends('admin.index')
@section('Title','Slide List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/slide/list')
@section('breadcrumbs_title','Slide List')

@section('content')
    <div class="container">
        <h2>Slide List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('slide/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Slide</a>
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
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($slides as $key => $slide)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$slide->title}}</td>
                                <td>{{$slide->details}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/slide/{{$slide->id.'.jpg'}}"></td>
                                <td>
                                    <a href="{{url('slide/edit')}}/{{$slide->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('slide/delete')}}/{{$slide->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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