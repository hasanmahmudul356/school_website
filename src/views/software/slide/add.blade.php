@extends('admin.index')
@section('Title','Slide List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/slide/list')
@section('breadcrumbs_title','Slide List')

@section('content')
    <div class="container">
        <h2>Add Slide</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('slide/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Slide</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>New Student</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($slide) ? url('slide/update') : url('slide/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Title</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($slide) ? $slide->id : ''}}">
                                <input id="required" placeholder="Slide Title" name="title" type="text" class="form-control" value="{{isset($slide) ? $slide->title : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Description</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="Description" title="student_name" name="details" type="text">{{isset($slide) ? $slide->details : ''}}</textarea>
                                <p class="text-danger">{{isset($errors) && $errors->has('details') ? $errors->first('details') : ''}}</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name"></label>
                            <div class="controls">
                                @if (isset($slide))
                                    <img style="height: 100px" id="ImageId" src="{{env('PUBLIC_PATH')}}/img/backend/slide/{{$slide->id.'.jpg'}}">
                                    @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png" id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name">Imag</label>
                            <div class="controls">
                                <input type="file" name="image" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>
                        <div class="control-group" style="margin-bottom: 50px">
                            <label for="student_name" class="control-label" title="student_name"></label>
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