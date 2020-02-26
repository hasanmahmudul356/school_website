@extends('admin.index')
@section('Title','Offer List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/offers/list')
@section('breadcrumbs_title','Offers List')

@section('content')
    <div class="container">
        <h2>Teacher Update</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('offers/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add offer</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>{{isset($data) && isset($data->teacher_name) ? $data->teacher_name : ''}}</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{url('teacher/update')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Teachers Say</label>
                            <div class="controls">
                                <input type="hidden" name="teacher_id" value="{{isset($data) && isset($data->teacher_id) ? $data->teacher_id : ''}}">
                                <textarea rows="3" name="teachers_say">{{isset($data) && isset($data->teachers_say) ? $data->teachers_say : ''}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Facebook</label>
                            <div class="controls">
                                <input  name="facebook" type="text" class="form-control" value="{{isset($data) && isset($data->facebook) ? $data->facebook : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Twitter</label>
                            <div class="controls">
                                <input  name="twitter" type="text" class="form-control" value="{{isset($data) && isset($data->twitter) ? $data->twitter : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Pinterest</label>
                            <div class="controls">
                                <input  name="pinterest" type="text" class="form-control" value="{{isset($data) && isset($data->pinterest) ? $data->pinterest : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Linkedin</label>
                            <div class="controls">
                                <input  name="linkedin" type="text" class="form-control" value="{{isset($data) && isset($data->linkedin) ? $data->linkedin : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Youtube</label>
                            <div class="controls">
                                <input  name="youtube" type="text" class="form-control" value="{{isset($data) && isset($data->youtube) ? $data->youtube : ''}}">
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