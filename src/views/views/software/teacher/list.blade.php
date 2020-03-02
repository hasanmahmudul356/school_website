@extends('admin.index')
@section('Title','offer List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/offers/list')
@section('breadcrumbs_title','offers List')

@section('content')
    <div class="container">
        <h2>Teacher List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('teacher/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add offers</a>
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
                            <th>Name</th>
                            <th>Department</th>
                            <th>Medium</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data_list as $key => $teacher)
                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$teacher->teacher_name}}</td>
                                <td>{{$teacher->work_department}}</td>
                                <td>{{$teacher->medium}}</td>
                                <td>{{$teacher->mobile_no}}</td>
                                <td>
                                    <a id="{{$teacher->teacher_id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('teacher/edit')}}/{{$teacher->teacher_id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('teacher/is_homepage')}}/{{$teacher->teacher_id}}" class="btn {{$teacher->is_homepage == 1 ? 'btn-success' : 'btn-default'}}"><i class="fa fa-check"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('teacher/delete')}}/{{$teacher->teacher_id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

@stop