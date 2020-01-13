@extends('admin.index')
@section('Title','News List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/News/list')
@section('breadcrumbs_title','News List')

@section('content')
    <div class="container">
        <h2>News List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('news/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add News</a>
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
                            <th>Photo</th>
                            <th>Topic</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $news)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/news/{{$news->id.'.jpg'}}"></td>
                                <td>{{$news->topic}}</td>
                                <td>{{$news->details}}</td>
                                <td>
                                    <a href="{{url('news/edit')}}/{{$news->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('news/delete')}}/{{$news->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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