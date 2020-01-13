@extends('admin.index')
@section('Title','socialmedia List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/socialmedia/list')
@section('breadcrumbs_title','socialmedia List')

@section('content')
    <div class="container">
        <h2>Social Media List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('socialmedia/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Social Media</a>
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
                            <th>Link</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $socialmedia)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$socialmedia->title}}</td>
                                <td>{{$socialmedia->details}}</td>
                                <td>
                                    <i class="fa {{$socialmedia->icon}}"></i>
                                </td>
                                <td>
                                    <a href="{{url('socialmedia/edit')}}/{{$socialmedia->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('socialmedia/delete')}}/{{$socialmedia->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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