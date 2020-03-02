@extends('admin.index')
@section('Title','Contactform List')
@section('breadcrumbs','Admin')
@section('breadcrumbs_link','/Contactform/list')
@section('breadcrumbs_title','Contactform List')

@section('content')
    <div class="container">
        <h2>Contactform List</h2>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">

                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @if (count($data_list) > 0)
                            @foreach($data_list as $key => $Contactform)
                                <tr class="gradeX">
                                    <td>{{$key+1}}</td>
                                    <td>{{$Contactform->firstname}}</td>
                                    <td>{{$Contactform->lastname}}</td>
                                    <td>{{$Contactform->phone}}</td>
                                    <td>{{$Contactform->subject}}</td>
                                    <td>{{$Contactform->message}}</td>
                                    <td>
                                        <a id="{{$Contactform->id}}" class="btn btn-primary viewDetailsButton"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="{{url('contactform/delete')}}/{{$Contactform->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr class="gradeX">
                                <td colspan="7">Data Not Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop