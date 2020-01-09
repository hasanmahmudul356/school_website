@extends('admin.index')
@section('Title','contactform List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/contactform/list')
@section('breadcrumbs_title','contactform List')

@section('content')
    <div class="container">
        <h2>Contactform List</h2>
        <div id="home" class="row">
            &nbsp;
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

                        @foreach($data_list as $key => $contactform)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$contactform->contactform_name}}</td>
                                <td>{{$contactform->work_department}}</td>
                                <td>{{$contactform->medium}}</td>
                                <td>{{$contactform->mobile_no}}</td>
                                <td>
                                    <a href="{{url('contactform/edit')}}/{{$contactform->contactform_id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('contactform/is_homepage')}}/{{$contactform->contactform_id}}" class="btn {{$contactform->is_homepage == 1 ? 'btn-success' : 'btn-default'}}"><i class="fa fa-check"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('contactform/delete')}}/{{$contactform->contactform_id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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