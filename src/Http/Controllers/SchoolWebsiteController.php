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
use Tmss\School_website\Http\Models\Testimonial;

class SchoolWebsiteController
{
    use PackageHelper;

    public function index()
    {
        $data['slides'] = Slides::take(10)->orderBy('id', 'DESC')->get();
        $data['slides'] = Slides::take(10)->orderBy('id', 'DESC')->get();
        $data['facilities'] = Facility::take(10)->orderBy('id', 'DESC')->get();
        $data['teachers'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id', '=', 'teacher_socials.teacher_id')->where('is_homepage', 1)->select('teacher_socials.*', 'teacher.*', 'teacher.teacher_id')->get();
        $data['offers'] = Offers::take(10)->get();
        $data['testimonials'] = Testimonial::take(10)->get();
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');
        $data['news'] = News::take(10)->orderBy('id', 'DESC')->get();
        $data['photogallery'] = Photogallery::take(4)->orderBy('id', 'DESC')->get();
        $data['socialmedias'] = Socialmedia::take(4)->orderBy('id', 'DESC')->get();
        $data['pages'] = Page::all()->toArray();
//        dd($data['socialmedias']);

        return view($this->ExistViewReturn('website.home'), $data);
    }

    public function AboutUs()
    {
        return view($this->ExistViewReturn('website.about_us'));
    }

    public function Teachers()
    {
        $data['teachers'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id', '=', 'teacher_socials.teacher_id')->select('teacher_socials.*', 'teacher.*', 'teacher.teacher_id')->get();
        return view($this->ExistViewReturn('website.teacher'), $data);
    }

    public function Course()
    {
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');
        return view($this->ExistViewReturn('website.courses'), $data);
    }

    public function Coursedetails($id)
    {

        $data['faculty'] = Faculty::leftJoin('manage_department', 'faculty.coursecode', '=', 'manage_department.department_code')->where('coursecode', $id)->first();
        if ($data['faculty']) {
            return view($this->ExistViewReturn('website.course_details'), $data);
        } else {
            return redirect(url('courses'));
        }
    }

    public function Pagedetails($url)
    {
        $page = Page::where('url', $url)->first();
        if ($page) {
            return view($this->ExistViewReturn('website.' . $page->template), ['page' => $page]);
        } else {

        }

    }


    public function RegistrationForm()
    {
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');
        $data['sessions'] = ov_setup_model::where('type', 'Session')->get()->toArray();
        return view($this->ExistViewReturn('website.registration'), $data);
    }

    public function RegistrationSubmit(Request $request)
    {
        $input = $request->input('data');
        $all_data = array_merge($input['student_information'], $input['image'], $input['parmanent_address']);

        $applicant_student = new ApplicantStudent();
        $validate = Validator::make($all_data, $applicant_student->validationRules());
        if ($validate->fails()) {
            return response()->json(['status' => 3000, 'error' => $validate->errors()], 200);
        }
        DB::beginTransaction();

        $applicant_student->fill($input['student_information']);
        $applicant_student->save();

        // $input['education'] = $applicant_student->applicant_id;
        $input['present_address']['parent'] = $applicant_student->applicant_id;
        $input['parmanent_address']['parent'] = $applicant_student->applicant_id;

        $arr = [];
        foreach ($input['education'] as $key => $education) {
            $arr[$key] = $education;
            $arr[$key]['applicant_id'] = $applicant_student->applicant_id;
        }

        $reference = [];
        foreach ($input['reference'] as $key => $reference) {
            $arr[$key] = $education;
            $arr[$key]['applicant_id'] = $applicant_student->applicant_id;
        }

        DB::table('applicant_student_educational_q')->insert($arr);
        DB::table('applicant_student_reference')->insert($reference);
        DB::table('applicant_student_child')->insert($input['present_address']);
        DB::table('applicant_student_child')->insert($input['parmanent_address']);

        DB::commit();

        if (!File::exists(public_path() . "/img/backend/applicant/picture")) {
            File::makeDirectory(public_path() . "/img/backend/applicant/picture");
        }
        if (!File::exists(public_path() . "/img/backend/applicant/nid")) {
            File::makeDirectory(public_path() . "/img/backend/applicant/nid");
        }
        if (!File::exists(public_path() . "/img/backend/applicant/certificate")) {
            File::makeDirectory(public_path() . "/img/backend/applicant/certificate");
        }

        //=========Insert NID======================
        $data = $input['image'];
        $image = $data['applicant_image'];  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);

        $position = strpos($image, ";");
        $sub_str = substr($image, 0, $position);
        $extenstion = explode("/", $sub_str);

        $imageName = $applicant_student->applicant_id . '.jpg';
        File::put(public_path() . '/img/backend/applicant/picture/' . $imageName, base64_decode($image));

        //=========Insert Picture======================
        $data = $input['image'];
        $image = $data['applicant_nid'];  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);

        $position = strpos($image, ";");
        $sub_str = substr($image, 0, $position);
        $extenstion = explode("/", $sub_str);

        $imageName = $applicant_student->applicant_id . '.jpg';
        File::put(public_path() . '/img/backend/applicant/nid/' . $imageName, base64_decode($image));

        //=========Insert Picture======================
        $data = $input['image'];
        $image = $data['academic_certificate'];  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);

        $position = strpos($image, ";");
        $sub_str = substr($image, 0, $position);
        $extenstion = explode("/", $sub_str);

        $imageName = $applicant_student->applicant_id . '.jpg';
        File::put(public_path() . '/img/backend/applicant/certificate/' . $imageName, base64_decode($image));


        return response()->json(['status' => 2000, 'msg' => 'Successfully Inserted'], 200);
    }
}