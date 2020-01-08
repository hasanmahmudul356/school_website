<?php


namespace Tmss\School_website\Http\Controllers;



use App\teacher_model;
use Tmss\School_website\Http\Helper\PackageHelper;
use Tmss\School_website\Http\Models\Facility;
use Tmss\School_website\Http\Models\Offers;
use Tmss\School_website\Http\Models\Slides;
use Tmss\School_website\Http\Models\Testimonial;

class SchoolWebsiteController
{
    use PackageHelper;

    public function index(){
        $data['slides'] = Slides::take(10)->orderBy('id','DESC')->get();
        $data['facilities'] = Facility::take(10)->orderBy('id','DESC')->get();
        $data['teachers'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id','=','teacher_socials.teacher_id')->where('is_homepage', 1)->select('teacher_socials.*','teacher.*','teacher.teacher_id')->get();
        $data['offers'] = Offers::take(10)->get();
        $data['testimonials'] = Testimonial::take(10)->get();
        return view($this->ExistViewReturn('website.home'), $data);
    }
}