@extends('admin.index')
@section('Title','Photo Gallery List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/photogallery/list')
@section('breadcrumbs_title','Photo Gallery List')

@section('content')
    <div class="container">
        <h2>Add Photo Gallery</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('photogallery/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Feature</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Photo Gallery</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($data) ? url('photogallery/update') : url('photogallery/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="student_name" class="control-label" title="student_name"></label>
                            <div class="controls">
                                @if (isset($data))
                                    <img style="height: 100px" id="ImageId" src="{{env('PUBLIC_PATH')}}/img/backend/slide/{{$data->id.'.jpg'}}">
                                @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png" id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="image" class="control-label" title="image">Image</label>
                            <div class="controls">
                                <input type="file" name="image" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="topic" class="control-label" title="topic">Topic</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input  placeholder="Topic" name="topic" type="text" class="form-control" value="{{isset($data) ? $data->topic : ''}}">
                            </div>
                        </div><div class="control-group">
                            <label for="photocategory" class="control-label" title="photocategory">photo Category</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input  placeholder="photocategory" name="photocategory" type="text" class="form-control" value="{{isset($data) ? $data->photocategory : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="details" class="control-label" title="Details">Details</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="details" title="Details" name="details" type="text">{{isset($data) ? $data->details : ''}}</textarea>
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