@extends('admin.index')
@section('Title','Faculty List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/Faculty/list')
@section('breadcrumbs_title','Faculty List')
@section('style')
    <style>
        input, textarea, .uneditable-input {
            width: 435px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <h2>Add Config Item</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('website_configs/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Config Item</a>
            </div>
        </div>
        <div id="Vue_component_wrapper" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Config Item</h5>
                </div>
                <form class="form-horizontal" method="post"
                      action="{{isset($data) ? url('website_configs/update') : url('website_configs/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="coursecode" class="control-label" title="title">Type</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : '' }}">
                                <select v-model="formElement.type" name="type" id="type">
                                    <option {{isset($data) && $data->type == 'text' ? 'selected' : ''}} value="text">Text</option>
                                    <option {{isset($data) && $data->type == 'textarea' ? 'selected' : ''}} value="textarea">Textarea</option>
                                    <option {{isset($data) && $data->type == 'file' ? 'selected' : ''}} value="file">File</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="coursecode" class="control-label" title="title">Field Name</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="text" name="name" value="{{isset($data) ? $data->name : ''}}" placeholder="Field Name" class="form-control">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" title="title">Display Name</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="text" value="{{isset($data) ? $data->display_name : ''}}" name="display_name"  placeholder="Display Name" class="form-control">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="scope" class="control-label" title="scope">Value</label>
                            <div class="control-group" v-if="formElement.type === 'file'">
                                <label for="page_photo" class="control-label" title="Page Photo"></label>
                                <div class="controls">
                                    @if (isset($data))
                                        <img style="height: 100px" id="ImageId" src="{{env('PUBLIC_PATH')}}/img/backend/config/{{$data->value}}">
                                    @else
                                        <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png"
                                             id="ImageId">
                                    @endif
                                </div>
                                <div class="controls">
                                    <input type="file" name="value" onchange="showImage(this, 'ImageId')">
                                    <input v-if="formElement.type === 'file'" type="hidden" name="value" value="{{isset($data) ? $data->value : ''}}">
                                </div>
                            </div>
                            <div class="controls" v-else-if="formElement.type === 'text'">
                                <input type="text" value="{{isset($data) ? $data->value : ''}}" name="value" placeholder="Display Name" class="form-control">
                            </div>
                            <div class="controls" v-else-if="formElement.type === 'textarea'">
                                <textarea id="body" class="form-control" placeholder="value Of the field" title="scope" rows="4" name="value" type="text">{{isset($data) ? $data->value : ''}}</textarea>
                            </div>

                            @if (isset($data) && $data->type == 'file')
                                @elseif (isset($data) && $data->type == 'text')
                                @elseif (isset($data) && $data->type == 'textarea')
                            @endif
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
@section('script')
    <script src="{{env('PUBLIC_PATH')}}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/vue/vue.js"></script>
    <script>
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                formElement: {
                    type: '{{isset($data) ? $data->type : 'text'}}',
                },
            },
        });
    </script>
@stop