@extends('admin.index')
@section('Title','Faculty List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/faculty/list')
@section('breadcrumbs_title','Faculty List')

@section('content')
    <div class="container">
        <h2>Faculty List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('faculty/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Faculty</a>
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
                            <th>Faculty Photo</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($data_list as $key => $faculty)
                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('SOFTWARE_PUBLIC_PATH')}}/img/backend/faculty/{{$faculty->id.'.jpg'}}"></td>
                                <td>{{$faculty->department_name}}</td>
                                <td>
                                    <a id="{{$faculty->id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('faculty/edit')}}/{{$faculty->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('faculty/delete')}}/{{$faculty->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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