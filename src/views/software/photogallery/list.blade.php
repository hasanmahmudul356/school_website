@extends('admin.index')
@section('Title','Photo Gallery List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/photogallery/list')
@section('breadcrumbs_title','Photo Gallery List')

@section('content')
    <div class="container">
        <h2>Photo Gallery List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('photogallery/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Photo Gallery</a>
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
                            <th>image</th>
                            <th>Topic</th>
                            <th>Photo Category</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $photogallery)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/photogallery/{{$photogallery->id.'.jpg'}}"></td>
                                <td>{{$photogallery->topic}}</td>
                                <td>{{$photogallery->photocategory}}</td>
                                <td>{{$photogallery->details}}</td>
                                <td>
                                    <a href="{{url('photogallery/edit')}}/{{$photogallery->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('photogallery/delete')}}/{{$photogallery->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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