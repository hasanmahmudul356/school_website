@extends('admin.index')
@section('Title','photocategory List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/photocategory/list')
@section('breadcrumbs_title','photocategory List')

@section('content')
    <div class="container">
        <h2>photocategory List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('photocategory/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add category</a>
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
                            <th>Topic</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $photocategory)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$photocategory->topic}}</td>
                                <td>{{$photocategory->details}}</td>
                                <td>
                                    <a id="{{$photocategory->id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('photocategory/edit')}}/{{$photocategory->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('photocategory/delete')}}/{{$photocategory->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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