<?php


namespace Tmss\School_website\Http\Controllers;


use App\ApplicantStudent;
use App\ov_setup_model;
use App\student_educational_qualification_model;
use App\students;

use App\Http\Controllers\Manage_department;
use App\manage_department_model;

use App\teacher_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Tmss\School_website\Http\Helper\PackageHelper;
use Tmss\School_website\Http\Models\Contactform;
use Tmss\School_website\Http\Models\Facility;
use Tmss\School_website\Http\Models\Faculty;
use Tmss\School_website\Http\Models\News;
use Tmss\School_website\Http\Models\Offers;
use Tmss\School_website\Http\Models\Page;
use Tmss\School_website\Http\Models\Photocategory;
use Tmss\School_website\Http\Models\Photogallery;
use Tmss\School_website\Http\Models\Slides;
use Tmss\School_website\Http\Models\Socialmedia;
use Tmss\School_website\Http\Models\Subscribe;
use Tmss\School_website\Http\Models\Testimonial;
use Tmss\School_website\Http\Models\Website_configs;

class WebsiteDataViewApiController
{
    public function SlideDataView($id){
        $model = new Slides();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function FacilityDataDetails($id){
        $model = new Facility();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function TeacherDetails($id){
        $model = new teacher_model();
        $data = $model->where('teacher_id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function OfferDetails($id){
        $model = new Offers();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function TestimonialDetails($id){
        $model = new Testimonial();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function ContactDetails($id){
        $model = new Contactform();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function SubscribeDetails($id){
        $model = new Subscribe();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function NewsDetails($id){
        $model = new News();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function PhotogalleryDetails($id){
        $model = new Photogallery();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function PhotocategoryDetails($id){
        $model = new Photocategory();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function SocialmediaDetails($id){
        $model = new Socialmedia();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function PageDetails($id){
        $model = new Page();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function FacultyDetails($id){
        $model = new Faculty();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function WebconfigurationDetails($id){
        $model = new Website_configs();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
    public function ShortCodeDetails($id){
        $model = new Faculty();
        $data = $model->where('id', $id)->first();
        if ($data){
            return response()->json(['status'=>2000, 'data'=>$data], 200);
        }else{
            return response()->json(['status'=>3000, 'data'=>[]], 200);
        }
    }
}