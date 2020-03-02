@extends('admin.index')
@section('Title','Configuration List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/website_configs/list')
@section('breadcrumbs_title','Website Configuration List')
@section('style')
    <style>
        input, textarea, .uneditable-input {
            width: 435px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <h2>Add Website Configuration</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('website_configs/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Configuration</a>
            </div>
        </div>
        <div id="Vue_component_wrapper" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Configuration</h5>
                </div>
                <form class="form-horizontal" method="post"
                      action="{{isset($data) ? url('website_configs/update') : url('website_configs/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="logo" class="control-label" title="Logo"></label>
                            <div class="controls">
                                @if (isset($data))
                                    <img style="height: 100px" id="ImageId"
                                         src="{{env('PUBLIC_PATH')}}/img/backend/website_configs/{{$data->id.'.jpg'}}">
                                @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png"
                                         id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="logo" class="control-label" title="logo">logo</label>
                            <div class="controls">
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input type="file" name="logo" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="banner_image" class="control-label" title="banner_image"></label>
                            <div class="controls">
                                @if (isset($data))
                                    <img style="height: 100px" id="ImageId"
                                         src="{{env('PUBLIC_PATH')}}/img/backend/website_configs/{{$data->id.'.jpg'}}">
                                @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png"
                                         id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="banner_image" class="control-label" title="banner_image">banner_image</label>
                            <div class="controls">
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input type="file" name="banner_image" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="address" class="control-label" title="address">address</label>
                            <div class="controls">
                                <textarea class="form-control" placeholder="address" title="address" name="address" type="text">{{isset($data) ? $data->address : ''}}</textarea>
                                <p class="text-danger">{{isset($errors) && $errors->has('address') ? $errors->first('address') : ''}}</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="contactperson" class="control-label" title="contactperson">contactperson</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input  placeholder="contactperson" name="contactperson" type="text" class="form-control" value="{{isset($data) ? $data->contactperson : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="contactno" class="control-label" title="contactno">contactno</label>
                            <div class="controls">
                                <input  placeholder="contactno" name="contactno" type="text" class="form-control" value="{{isset($data) ? $data->contactno : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email" class="control-label" title="email">email</label>
                            <div class="controls">
                                <input  placeholder="email" name="email" type="text" class="form-control" value="{{isset($data) ? $data->email : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="phone" class="control-label" title="phone">phone</label>
                            <div class="controls">
                                <input  placeholder="phone" name="phone" type="text" class="form-control" value="{{isset($data) ? $data->phone : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="web" class="control-label" title="web">web</label>
                            <div class="controls">
                                <input  placeholder="web" name="web" type="text" class="form-control" value="{{isset($data) ? $data->web : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="google_map" class="control-label" title="google_map">google_map</label>
                            <div class="controls">
                                <input  placeholder="google_map" name="google_map" type="text" class="form-control" value="{{isset($data) ? $data->google_map : ''}}">
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
@section('script')
    {{--<script src="{{env('PUBLIC_PATH')}}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/vendor/front_assets/vue/vue.js"></script>
    <script>
        tinyMCE.init({
            selector: 'textarea',
            plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern code directionality"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",
            menubar: true,
            statusbar: false,
            convert_urls: true,
        });
    </script>
    <script>
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                formElement: {
--}}{{--                    templete: '{{isset($data) ? $data->template : 'default_website_configs'}}',--}}{{--
--}}{{--                    is_menu: parseInt('{{isset($data) ? $data->is_menu : '0'}}'),--}}{{--
                },
            },
        });
    </script>--}}
@stop