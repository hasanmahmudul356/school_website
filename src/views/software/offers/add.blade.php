@extends('admin.index')
@section('Title','Offer List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/offers/list')
@section('breadcrumbs_title','Offers List')

@section('content')
    <div class="container">
        <h2>Add Offers</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('offers/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add offer</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Offers</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($data) ? url('offers/update') : url('offers/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Icon</label>
                            <div class="controls">
                                @php
                                    $icons = Config::has('fontawesome_icon') ? Config::get('fontawesome_icon') : [];
                                @endphp
                                <select class="form-control" name="icon">
                                    @foreach($icons as $class => $icon)
                                        <option {{isset($data) && $data->icon == $class ? 'Selected' : ''}} value="{{$class}}">{!! $icon !!} {{$class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Title</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input  placeholder="Offer Title" name="title" type="text" class="form-control" value="{{isset($data) ? $data->title : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Description</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="Description" title="student_name" name="details" type="text">{{isset($data) ? $data->details : ''}}</textarea>
                                <p class="text-danger">{{isset($errors) && $errors->has('details') ? $errors->first('details') : ''}}</p>
                            </div>
                        </div>
                        <div class="control-group" style="margin-bottom: 50px">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop