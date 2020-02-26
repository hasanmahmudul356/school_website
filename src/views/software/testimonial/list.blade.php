@extends('admin.index')
@section('Title','testimonial List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/testimonial/list')
@section('breadcrumbs_title','testimonial List')

@section('content')
    <div class="container">
        <h2>testimonial List</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right" style="padding: 0 15px">
                <a href="{{url('testimonial/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add testimonial</a>
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
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($data_list as $key => $testimonial)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td><img style="max-height: 30px" src="{{env('PUBLIC_PATH')}}/img/backend/testimonial/{{$testimonial->id.'.jpg'}}"></td>
                                <td>{{$testimonial->title}}</td>
                                <td>{{$testimonial->relation}}</td>
                                <td>{{$testimonial->details}}</td>
                                <td>
                                    <a id="{{$testimonial->id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('testimonial/edit')}}/{{$testimonial->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="{{url('testimonial/delete')}}/{{$testimonial->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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