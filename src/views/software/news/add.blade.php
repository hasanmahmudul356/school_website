@extends('admin.index')
@section('Title','News List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/News/list')
@section('breadcrumbs_title','News List')

@section('content')
    <div class="container">
        <h2>Add News</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('news/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Feature</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add News</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($data) ? url('news/update') : url('news/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="news_photo" class="control-label" title="News Photo"></label>
                            <div class="controls">
                                @if (isset($data))
                                    <img style="height: 100px" id="ImageId" src="{{env('PUBLIC_PATH')}}/img/backend/news/{{$data->id.'.jpg'}}">
                                @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png" id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="news_photo" class="control-label" title="news_photo">Image</label>
                            <div class="controls">
                                <input type="file" name="image" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="topic" class="control-label" title="Topic">Topic</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input  placeholder="Topic" name="topic" type="text" class="form-control" value="{{isset($data) ? $data->topic : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="details" class="control-label" title="details">Details</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="Details" title="Details" name="details" type="text">{{isset($data) ? $data->details : ''}}</textarea>
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