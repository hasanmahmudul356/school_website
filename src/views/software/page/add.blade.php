@extends('admin.index')
@section('Title','Page List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/Page/list')
@section('breadcrumbs_title','Page List')
@section('style')
    <style>
        input, textarea, .uneditable-input {
            width: 435px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <h2>Add Page</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('page/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Page</a>
            </div>
        </div>
        <div id="Vue_component_package_wrapper" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Page</h5>
                </div>
                <form class="form-horizontal" method="post"
                      action="{{isset($data) ? url('page/update') : url('page/add')}}" enctype="multipart/form-data">
                    <div class="widget-content nopadding">
                        <div class="control-group">
                            <label for="page_photo" class="control-label" title="Page Photo"></label>
                            <div class="controls">
                                @if (isset($data))
                                    <img style="height: 100px" id="ImageId"
                                         src="{{env('PUBLIC_PATH')}}/img/backend/page/{{$data->id.'.jpg'}}">
                                @else
                                    <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/img/blankavatar.png"
                                         id="ImageId">
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="page_photo" class="control-label" title="page_photo">Image</label>
                            <div class="controls">
                                <input type="file" name="image" onchange="showImage(this, 'ImageId')">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="topic" class="control-label" title="title">Title</label>
                            <div class="controls">
                                {{@csrf_field()}}
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <input placeholder="Title" name="title" type="text" class="form-control"
                                       value="{{isset($data) ? $data->title : ''}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="topic" class="control-label" title="Topic">Template</label>
                            <div class="controls">
                                <select class="form-control" name="template" v-model="formElement.templete">
                                    <option {{isset($data->template) && $data->home=='home' ? 'selected' : '' }} value="home">Home Page</option>
                                    <option {{isset($data->template) && $data->template=='default_page' ? 'selected' : '' }} value="default_page">Default Page</option>
                                    <option {{isset($data->template) && $data->template=='about_us' ? 'selected' : '' }} value="about_us">About Us</option>
                                    <option {{isset($data->template) && $data->template=='contact_us' ? 'selected' : '' }} value="contact_us">Contact Us</option>
                                    <option {{isset($data->template) && $data->template=='courses' ? 'selected' : '' }} value="courses">Courses</option>
                                    <option {{isset($data->template) && $data->template=='pricing' ? 'selected' : '' }} value="pricing">Pricing</option>
                                    <option {{isset($data->template) && $data->template=='blog' ? 'selected' : '' }} value="blog">Blog</option>
                                    <option {{isset($data->template) && $data->template=='teacher' ? 'selected' : '' }} value="teacher">Teacher</option>
                                    <option {{isset($data->faculty_page) && $data->template=='faculty_page' ? 'selected' : '' }} value="faculty_page">Faculty Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" v-if="formElement.templete == 'default_page'">
                            <label for="details" class="control-label" title="details">Details</label>
                            <div class="controls">
                                <textarea id="body" class="form-control" placeholder="description" title="description" rows="10"
                                          name="description" type="text">{{isset($data) ? $data->description : ''}}</textarea>
                                <p class="text-danger">{{isset($errors) && $errors->has('description') ? $errors->first('description') : ''}}</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="details" class="control-label" title="details">Show In Menu</label>
                            <div class="controls">
                                <label class="radio-inline">
                                    <input v-model="formElement.is_menu" type="radio" value="1" name="is_menu">Yes</label>
                                <label class="radio-inline">
                                    <input v-model="formElement.is_menu" type="radio" name="is_menu" value="0">No</label>
                            </div>
                        </div>
                        <div class="control-group" v-if="formElement.is_menu ==  1">
                            <label for="details" class="control-label" title="details">Menu Position</label>
                            <div class="controls">
                                <label class="radio-inline"><input {{isset($data->position) && $data->position=='main_menu' ? 'checked' : '' }} type="radio" name="position" value="main_menu">Main Menu</label>
                                <label class="radio-inline"><input {{isset($data->position) && $data->position=='about_us_footer_menu' ? 'checked' : '' }} type="radio" name="position" value="about_us_footer_menu">Footer Second Block</label>
                                <label class="radio-inline"><input {{isset($data->position) && $data->position=='footer_menu' ? 'checked' : '' }} type="radio" name="position" value="footer_menu">Footer Third Block</label>
                            </div>
                        </div>
                        <div class="control-group" v-if="formElement.is_menu ==  1" style="display: none;">
                            <label for="topic" class="control-label" title="Topic">Parent Menu</label>
                            <div class="controls">
                                <select class="form-control" name="parent">
                                    <option selected value="">Null</option>
                                </select>
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
    <script src="{{env('PUBLIC_PATH')}}/tinymce/js/tinymce/tinymce.min.js"></script>
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
            el: '#Vue_component_package_wrapper',
            data: {
                formElement: {
                    templete: '{{isset($data) ? $data->template : 'default_page'}}',
                    is_menu: parseInt('{{isset($data) ? $data->is_menu : '0'}}'),
                },
            },
        });
    </script>
@stop