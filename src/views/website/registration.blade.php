@php
    $blade_url = '';
    if (view()->exists('vendor.school_website')) {
    $blade_url = 'vendor.school_website';
    } else {
    $blade_url = 'school_website::';
    }
@endphp
@extends($blade_url.'website.layouts.master')
@section('style')
    <style>
        .img.align-self-stretch {
            background-image: url(http://localhost/edudesk_package/public/img/blankavatar.png);
        }
    </style>
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2" style="">
        @php
            if(File::exists(public_path('/img/backend/page/'.$page->id.'.jpg'))){
                $image = env('PUBLIC_PATH').'/img/backend/page/'.$page->id.'.jpg';
            }else{
                $image = env('PUBLIC_PATH').'/img/backend/config/'.$config['tisibanner'];
            }
        @endphp
        <div class="overlay" style="background: url('{{$image}}');"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{$page->title}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$page->title}}</span></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-md-8 offset-md-2 applicationform" id="Vue_component_wrapper">
            <form @submit.prevent="SubmitRegistration($event)">


                <hr style="border:1px solid green;">
                <div class="row ">
                    <div class="mx-auto col-md-3 col-xs-12 text-head">
                        <h4 class=" text-center"> Admission Form</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name of the Trade</label>
                        <select v-model="FormData.department" class="form-control">
                            <option value="">Select Trade</option>
                            @if (isset($courses) && count($courses) > 0)
                                @foreach ($courses as $course)
                                    <option value="{{$course['department_name']}}">{{$course['department_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" v-text="error.get('department')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Session</label>
                        <select v-model="FormData.session" class="form-control">
                            <option value="">Select Session</option>
                            @if (isset($sessions) && count($sessions) > 0)
                                @foreach ($sessions as $session)
                                    <option value="{{$course['department_name']}}">{{$session['type_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="text-danger" v-text="error.get('session')"></p>
                    </div>
                </div>
                <h4>Applicant Name </h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">In English</label>
                        <input type="text" v-model="FormData.student_name" class="form-control"/>
                        <p class="text-danger" v-text="error.get('student_name')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">In Bangla</label>
                        <input type="text" v-model="FormData.student_name_bangla" class="form-control"/>
                        <p class="text-danger" v-text="error.get('student_name_bangla')"></p>
                    </div>
                </div>
                <div class="row gender">
                    <div class="col-md-6">
                        <label for="">Gender</label>
                        <select v-model="FormData.gender" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <p class="text-danger" v-text="error.get('gender')"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Mother's Name</label>
                        <input v-model="FormData.parent_name" type="text" name="mothername" id="mothername" class="form-control"/>
                        <p class="text-danger" v-text="error.get('parent_name')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Father's Name</label>
                        <input v-model="FormData.parent_mother_name" type="text" name="fathername" id="fathername" class="form-control"/>
                        <p class="text-danger" v-text="error.get('parent_mother_name')"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Personal Mobile No</label>
                        <input v-model="FormData.phone" type="text" name="mobile" id="mobile" class="form-control"/>
                        <p class="text-danger" v-text="error.get('phone')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input v-model="FormData.email" type="text" name="email" id="email" class="form-control"/>
                        <p class="text-danger" v-text="error.get('email')"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Date of Birth</label>
                        <input v-model="FormData.birth_date" type="date" name="dob" id="dob" class="form-control"/>
                        <p class="text-danger" v-text="error.get('birth_date')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">NID No</label>
                        <input v-model="FormData.nid" type="text" name="nid" id="nid" class="form-control"/>
                        <p class="text-danger" v-text="error.get('nid')"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Ethnic Group</label>
                        <input v-model="FormData.ethnic_group" type="text" id="ethnic_group" name="ethnic_group" class="form-control"/>
                        <p class="text-danger" v-text="error.get('ethnic_group')"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Religion</label>
                        <select v-model="FormData.religion" class="form-control">
                            <option value="">Select</option>
                            <option value="Buddhist">Buddhist</option>
                            <option value="Sonaton">Sonatan</option>
                            <option value="Islam">Islam</option>
                            <option value="Christian">Christian</option>
                            <option value="Others">Others</option>
                        </select>
                        <p class="text-danger" v-text="error.get('religion')"></p>
                    </div>
                </div>
                <h4>Present Address</h4>
                <div class="row address">
                    <div class="col-md-3">
                        <label for="">Post Office</label>
                        <input v-model="present_address.post_office" type="text" id="post_office" name="post_office" class="form-control" placeholder="Post Office"/>
                        <p class="text-danger" v-text="error.get('post_office')"></p>
                    </div>
                    <div class="col-md-3">
                        <label for="">Home District</label>
                        <input v-model="present_address.home_district" type="text" id="home_district" name="home_district" class="form-control" placeholder="Home District"/>
                        <p class="text-danger" v-text="error.get('home_district')"></p>
                    </div>
                    <div class="col-md-3">
                        <label for="">Division</label>
                        <input v-model="present_address.division" type="text" id="division" name="division" class="form-control" placeholder="division"/>
                        <p class="text-danger" v-text="error.get('division')"></p>
                    </div>
                    <div class="col-md-3">
                        <label for="Address">Details</label>
                        <input v-model="present_address.village_name" type="text" id="village_name" name="village_name" class="form-control" placeholder="Details"/>
                        <p class="text-danger" v-text="error.get('village_name')"></p>
                    </div>
                </div>
                <h4>Permanent Address </h4>
                <div class="row address">
                    <div class="col-md-3">
                        <label for="">Post Office</label>
                        <input v-model="parmanent_address.post_office" type="text" id="post_office" name="post_office" class="form-control" placeholder="Post Office"/>
                    </div>
                    <div class="col-md-3">
                        <label for="">Home District</label>
                        <input v-model="parmanent_address.home_district" type="text" id="home_district" name="home_district" class="form-control" placeholder="Home District"/>
                    </div>
                    <div class="col-md-3">
                        <label for="">Division</label>
                        <input v-model="parmanent_address.division" type="text" id="division" name="division" class="form-control" placeholder="division"/>
                    </div>
                    <div class="col-md-3">
                        <label for="Address">Details</label>
                        <input v-model="parmanent_address.village_name" type="text" id="village_name" name="village_name" class="form-control" placeholder="Details"/>
                    </div>
                </div>




                <h4>Academic Information</h4>
                <div class="control-group">
                    <label for="">Educational Qualifications</label>
                    <div class="controls input_fields_wrap">
                        <table class="table address" >
                            <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Board</th>
                                <th>Reg No</th>
                                <th>Roll No</th>
                                <th>Group</th>
                                <th>Passing Year</th>
                                <th>GPA</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="(field, index) in education">
                                <td>
                                    <select v-if="index == 0" v-model="field.exam_name" class="form-control">
                                        <option value="">Select</option>
                                        <option value="SSC">SSC</option>
                                        <option value="SSC(voc)">SSC (Vocational)</option>
                                        <option value="Dakhil">Dakhil</option>
                                        <option value="O Level">O Level</option>
                                        <option value="Equivalent">Equivalent</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <select v-if="index == 1" v-model="field.exam_name" class="form-control">
                                        <option value="">Select</option>
                                        <option value="HSC">HSC</option>
                                        <option value="HSC(voc)">HSC (Voc)</option>
                                        <option value="Alim">Alim</option>
                                        <option value="A Level">A Level</option>
                                        <option value="HSC_(BM)">HSC (BM)</option>
                                        <option value="Diploma_engineering">Diploma Engineering</option>
                                        <option value="Equivalent">Equivalent</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <select v-if="index == 2" v-model="field.exam_name" id="exam_name_3" class="form-control">
                                        <option value="">Select</option>
                                        <option value="BA(Hon)">BA(Hon)</option>
                                        <option value="BSc(Hon)">BSc(Hon)</option>
                                        <option value="BBS(Hon)">BBS(Hon)</option>
                                        <option value="BA(pass)">BA(Pass)</option>
                                        <option value="BSc(Pass)">BSc(Pass)</option>
                                        <option value="BBS(Pass)">BBS(Pass)</option>
                                        <option value="BBA">BBA</option>
                                        <option value="BBA(Professional)">BBA(Professional)</option>
                                        <option value="Equivalent">Equivalent</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <select v-if="index == 3" v-model="field.exam_name" class="form-control">
                                        <option value="">Select</option>
                                        <option value="MA(1 year)">MA(1 year)</option>
                                        <option value="MSc(1 year)">MSc(1 year)</option>
                                        <option value="MBS(1 year)">MBS(1 year)</option>
                                        <option value="MA(2 year)">MA(2 year)</option>
                                        <option value="MSc(2 year)">MSc(2 year)</option>
                                        <option value="MBS(2 year)">MBS(2 year)</option>
                                        <option value="MBA">MBA</option>
                                        <option value="MBA(Professional)">MBA(Professional)</option>
                                        <option value="MBM">MBM</option>
                                        <option value="Equivalent">Equivalent</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </td>
                                <td>
                                    <select v-if="index === 0 || index === 1" v-model="field.borad" class="form-control " style="width: 330px;">
                                        <option value="">Select</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Comilla">Comilla</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Jashore">Jessore</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Technical">Technical</option>
                                        <option value="Madrasha">Madrasha</option>
                                    </select>
                                    <select v-if="index === 2 || index === 3" v-model="field.borad" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Dhaka University">Dhaka University</option>
                                        <option value="Chittagong University">Chittagong University</option>
                                        <option value="Comilla University">Comilla University</option>
                                        <option value="Rajshahi University">Rajshahi University</option>
                                        <option value="Jashore Sicence and Technology University">Jessore Sicence and Technology University</option>
                                        <option value="Hazi Dinesh science &amp; Technology University">Hazi Dinesh science &amp; Technology University</option>
                                        <option value="Khulna University">Khulna University</option>
                                        <option value="National University">National University</option>
                                        <option value="Shahjalal sicence &amp; Technology University">Shahjalal science &amp; Technology University</option>
                                        <option value="Technical">Others</option>
                                    </select>
                                </td>
                                <td>
                                    <input v-model="field.reg_no" placeholder="Reg No" title="Reg No" type="text" class="table_text" style="width: 100%;">
                                </td>
                                <td>
                                    <input v-model="field.roll_no" placeholder="Roll No" title="roll_no" type="text" class="table_text" style="width: 100%;">
                                </td>
                                <td>
                                    <input v-model="field.group" placeholder="Group" title="group" type="text" class="table_text" style="width: 100%;">
                                </td>
                                <td>
                                    <input v-model="field.passing_year" placeholder="Passing Year" title="passing_year" type="text" class="table_text" style="width: 100%;">
                                </td>
                                <td>
                                    <input v-model="field.gpa" placeholder="Gpa" title="gpa" type="text" class="table_text" style="width: 100%;">
                                </td>
                                <td>
                                    <button v-if="index === 0" @click="AddNewRow()" class="btn btn-success add_field_button" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button v-else @click="DeleteRow(index)" class="btn btn-danger add_field_button" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4>Referance</h4>
                <div class="row">
                    <div class="col-md-1">SL</div>
                    <div class="col-md-3">Name</div>
                    <div class="col-md-4">Address</div>
                    <div class="col-md-2">Contact No.</div>
                    <div class="col-md-2">Relation</div>
                </div>
                <div class="row" v-for="(reference, ref_index) in reference" style="margin-top: 10px">
                    <div class="col-md-1">1</div>
                    <div class="col-md-3">
                        <input type="text" v-model="reference.name" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <textarea v-model="reference.address" class="form-control" style="width:57%;"></textarea>
                    </div>
                    <div class="col-md-2">
                        <input type="text" v-model="reference.contact" class="form-control"/>
                    </div>
                    <div class="col-md-2">
                        <select v-model="reference.relation" class="form-control">
                            <option value="">Select</option>
                            <option value="Professional">Professional</option>
                            <option value="Academic">Academic</option>
                            <option value="Relative">Relative</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <!-- Image Uploading start from here -->
                <div class="row">
                    <div class="col-md-4 form-inline from-group">
                        <label for="">Applicant Picture:</label>(Size not more 100kb)
                        <input type="file" @change="UploadImage($event, 'applicant_image')" accept="image/*" value="Upload Picture" class="btn btn-info"/>
                        <p class="text-danger" v-text="error.get('applicant_image')"></p>
                    </div>
                    <div class="col-md-4 form-inline from-group">
                        <label for="">Applicant NID:</label> (Size not more 100kb)
                        <input type="file" @change="UploadImage($event, 'applicant_nid')" accept="image/*" value="Upload  NID" class="btn btn-info"/>
                        <p class="text-danger" v-text="error.get('applicant_nid')"></p>
                    </div>

                    <div class="col-md-4 form-inline from-group">
                        <label for="">Last Academic Certificates:</label> (Size not more 500kb)
                        <input type="file" @change="UploadImage($event, 'academic_certificate')" accept="image/*" value="Upload Academic Certificates" class="btn btn-info"/>
                        <p class="text-danger" v-text="error.get('academic_certificate')"></p>
                    </div>
                </div>
                <!--Image Uploading Close  -->
                <div class="row">
                    <div class="">
                        <h5 style="text-transform: uppercase;color:#4D4D4D"><u>Declearation:</u></h5>
                        <div class=" form-check">
                            <input type="checkbox" class="form-check-input" id="declearationChecked">
                            <label class="form-check-label" for="declearationChecked">
                                I hereby declare that the information given above is true to the best of
                                my knowledge, information and belief. I fully understand that if any of
                                the information given by me in this application is in any way false or
                                incorrect, the Center shall have the right to dismiss me without notice
                                and without assigning any reason whatsoever.

                            </label>
                        </div>
                    </div>
                </div>
                <div style="text-align:center;">
                    <input type="submit" name="btn-save" value="REGISTRATION" class="btn btn-success"/>
                    <a href="http://tfmti.com/">
                        <input type="button" src="http://tfmti.com/" value="BACK" class="btn btn-success"/>
                    </a>
                </div>
            </form>
        </div>
    </section>
@stop
@section('script')
    <script>
        class Errors{
            constructor(){
                this.errors = {};
                this.arr_errors = [];
            }
            get(field){
                if (this.errors[field]) {
                    return this.errors[field][0];
                }
            }
            arr_get(multi = false, key, arr_field){
                if (multi){
                    if (this.arr_errors[multi] !== undefined && this.arr_errors[multi][key] !== undefined && this.arr_errors[multi][key][arr_field] !== undefined) {
                        return this.arr_errors[multi][key][arr_field][0];
                    }
                } else{
                    if (this.arr_errors[key] !== undefined && this.arr_errors[key][arr_field] !== undefined) {
                        return this.arr_errors[key][arr_field][0];
                    }
                }
            }
            record(errors){
                this.errors = errors;
            }
            arr_record(arr_errors, multi = false){
                if (multi){
                    this.arr_errors[multi] = arr_errors;
                } else{
                    this.arr_errors = arr_errors;
                }
            }
        }

        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                app_url : baseURL,
                FormData : {
                    student_name : '',
                    student_name_bangla : '',
                    parent_name : '',
                    parent_mother_name : '',
                    relation : '',
                    session : '',
                    class : '',
                    admission_test : '',
                    department : '',
                    section : '',
                    birth_date : '',
                    gender : '',
                    postal_code : '',
                    phone : '',
                    email : '',
                    batch : '',
                    shift : '',
                    medium : '',
                    nid : '',
                    religion : '',
                    ethnic_group : '',
                },
                present_address : {
                    post_office : '',
                    home_district	 : '',
                    division	 : '',
                    village_name	 : '',
                    address_type : 'present',
                },
                parmanent_address : {
                    post_office : '',
                    home_district	 : '',
                    division	 : '',
                    village_name	 : '',
                    address_type : 'permanent',
                },
                education : [
                    {
                        exam_name : '',
                        borad : '',
                        reg_no : '',
                        roll_no : '',
                        group : '',
                        passing_year : '',
                        gpa : '',
                    }
                ],
                reference : [
                    {
                        name : '',
                        address : '',
                        contact : '',
                        relation : '',
                    },
                    {
                        name : '',
                        address : '',
                        contact : '',
                        relation : '',
                    }
                ],
                image : {
                    applicant_image : '',
                    applicant_nid : '',
                    academic_certificate : '',
                },
                error : new Errors(),
            },
            methods: {
                AddNewRow: function () {
                    const _this = this;
                    _this.education.push({
                        exam_name : '',
                        borad : '',
                        reg_no : '',
                        roll_no : '',
                        group : '',
                        passing_year : '',
                        gpa : '',
                    });
                },
                DeleteRow: function (index) {
                    const _this = this;
                    if (_this.education.length === 0){
                        alert('Only One row Available');
                    }else{
                        _this.education.splice(index, 1);
                    }
                },
                SubmitRegistration : function (event) {
                    const _this = this;
                    _this.error.record([]);
                    let URL = this.app_url + '/registration/submit';
                    $.ajax({
                        url: URL,
                        type: "post",
                        data: {
                            data: {
                                student_information : _this.FormData,
                                present_address : _this.present_address,
                                parmanent_address : _this.parmanent_address,
                                education : _this.education,
                                reference : _this.reference,
                                image : _this.image,
                            },
                        },
                        success: function (response) {
                            if (parseInt(response.status) === 2000) {
                                location.reload();
                            }else if (parseInt(response.status) === 3000) {
                                _this.error.record(response.error);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            _this.HttpRequest = false;
                            console.log(textStatus, errorThrown);
                        }
                    });
                },
                UploadImage:function(event, field)
                {
                    let file=event.target.files[0];
                    let reader=new FileReader();
                    reader.onload=event =>{
                        if (field == 'applicant_image'){
                            this.image.applicant_image = event.target.result;
                        }else if (field == 'applicant_nid'){
                            this.image.applicant_nid = event.target.result;
                        }else if (field == 'academic_certificate'){
                            this.image.academic_certificate = event.target.result;
                        }
                    }
                    reader.readAsDataURL(file)
                },
            },
        });
    </script>
@endsection