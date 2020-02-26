@extends('admin.index')
@section('Title','Category List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/photocategory/list')
@section('breadcrumbs_title','Category List')

@section('content')
    <div class="container">
        <h2>Add Category</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('photocategory/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Feature</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Category</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($data) ? url('photocategory/update') : url('photocategory/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="topic" class="control-label" title="topic">Topic</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input  placeholder="topic" name="topic" type="text" class="form-control" value="{{isset($data) ? $data->topic : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="details" class="control-label" title="details">Details</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="Description" title="details" name="details" type="text">{{isset($data) ? $data->details : ''}}</textarea>
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