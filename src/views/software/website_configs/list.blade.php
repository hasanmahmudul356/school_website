@extends('admin.index')
@section('Title','Website configuration List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/website_configs/list')
@section('breadcrumbs_title','Website configuration List')

@section('content')
    <div class="container">
        <h2>Website configuration List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('website_configs/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add configuration</a>
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
                            <th>Logo</th>
                            <th>Banner</th>
                            <th>Address</th>
                            <th>Contact Person</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Web</th>
                            <th>Google Map</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($data_list as $key => $website_configs)
                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/website_configs/{{$website_configs->id.'.jpg'}}"></td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/website_configs/{{$website_configs->id.'.jpg'}}"></td>
                                <td>{{$website_configs->coursecodeaddress}}</td>
                                <td>{{$website_configs->contactperson}}</td>
                                <td>{{$website_configs->contactno}}</td>
                                <td>{{$website_configs->email}}</td>
                                <td>{{$website_configs->phone}}</td>
                                <td>{{$website_configs->web}}</td>
                                <td>{{$website_configs->google_map}}</td>
                                <td>
                                    <a href="{{url('website_configs/edit')}}/{{$website_configs->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('website_configs/delete')}}/{{$website_configs->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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