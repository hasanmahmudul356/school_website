@extends('admin.index')
@section('Title','News List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/News/list')
@section('breadcrumbs_title','News List')

@section('content')
    <div class="container">
        <h2>Add Event</h2>
        <div id="home" class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('event/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Event</a>
            </div>
        </div>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Event</h5>
                </div>
                <form class="form-horizontal" method="post"  action="{{isset($data) ? url('event/update') : url('event/add')}}" enctype="multipart/form-data">
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
@section('script')
    <script src="{{env('PUBLIC_PATH')}}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinyMCE.init({
            selector: 'textarea',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern", "emoticons template paste textcolor colorpicker textpattern code directionality table", "insertdatetime media nonbreaking save table contextmenu directionality image",
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol |  ",
            menubar: false,
            statusbar: false,
            convert_urls: false,
            height : "250",
            paste_as_text: true,

            images_upload_url: '{{url('image/upload')}}',
            images_upload_base_path: '{{env('PUBLIC_PATH')}}/images',
            images_upload_credentials: true,
        });
    </script>
@stop