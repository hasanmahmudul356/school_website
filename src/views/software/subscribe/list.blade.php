@extends('admin.index')
@section('Title','subscribe List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/subscribe/list')
@section('breadcrumbs_title','subscribe List')

@section('content')
    <div class="container">
        <h2>subscribe List</h2>
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
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @if (count($data_list) > 0)
                            @foreach($data_list as $key => $subscribe)

                                <tr class="gradeX">
                                    <td>{{$key+1}}</td>
                                    <td>{{$subscribe->email}}</td>
                                    <td>
                                        <a onclick="return confirm('are you sure?')" href="{{url('subscribe/delete')}}/{{$subscribe->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">Data Not found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop