<?php


namespace Tmss\School_website\Http\Controllers;


use App\Http\Controllers\Controller;
use App\teacher_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Tmss\School_website\Http\Helper\PackageHelper;
use Tmss\School_website\Http\Models\Contactform;
use Tmss\School_website\Http\Models\Facility;
use Tmss\School_website\Http\Models\Offers;
use Tmss\School_website\Http\Models\Slides;
use Tmss\School_website\Http\Models\Testimonial;
use Tmss\School_website\Http\Models\TeacherSocial;


class SchoolWebsiteAdminController extends Controller
{
    use PackageHelper;

    public $blade_url = '';

    public function __construct(){
        if (view()->exists('vendor.school_website')) {
            $this->blade_url = 'vendor.school_website.';
        } else {
            $this->blade_url = 'school_website::';
        }
    }

    public function slideList(){
        $data['slides'] = Slides::all();
        if (count($data['slides']) > 0){
            return view($this->ExistViewReturn('software.slide.list'), $data);
        }else{
            return redirect(url('slide/add'));
        }
    }
    public function slideAddForm(){
        return view($this->blade_url.'software.slide.add');
    }
    public function slideStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $slide = new Slides();
        $slide->title = $request->input('title');
        $slide->details = $request->input('details');
        $slide->save();

        if($request->hasfile('image')){
            $imageName = $slide->id.'.jpg';
            $request->image->move(public_path('/img/backend/slide'), $imageName);

        }
        return redirect(url('slide/list'));
    }
    public function slideUpdateStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'id' => 'required',
        ]);

        $slide = Slides::where('id', $request->input('id'))->first();
        if ($slide){
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->save();

            if($request->hasfile('image')){
                $imageName = $slide->id.'.jpg';
                $request->image->move(public_path('/img/backend/slide'), $imageName);

            }
            return redirect(url('slide/list'));
        }else{
            return redirect(url('slide/list'));
        }
    }
    public function SlideEdit($id){
        $data['slide'] = Slides::where('id', $id)->first();
        if ($data['slide']){
            return view($this->blade_url.'software.slide.add',$data);
        }else{
            return redirect(url('slide/list'));
        }
    }
    public function SlideDelete($id){
        $slide = Slides::where('id', $id)->first();
        if ($slide){
            $slide->delete();

            return redirect(url('slide/list'));
        }else{
            return redirect(url('slide/list'));
        }
    }

    //==================Facility Methods=======================
    public function FacilityList(){
        $data['data_list'] = Facility::all();
        if (count($data['data_list']) > 0){
            return view($this->ExistViewReturn('software.facility.list'), $data);
        }else{
            return redirect(url('facilities/add'));
        }
    }
    public function FacilityAddForm(){
        return view($this->ExistViewReturn('software.facility.add'));
    }
    public function FacilityStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'color' => 'required',
            'icon' => 'required',
        ]);
        $slide = new Facility();
        $slide->title = $request->input('title');
        $slide->details = $request->input('details');
        $slide->colour = $request->input('color');
        $slide->icon = $request->input('icon');
        $slide->save();

        return redirect(url('facilities/list'));
    }
    public function FacilityEdit($id){
        $data['data'] = Facility::where('id', $id)->first();
        if ($data['data']){
            return view($this->ExistViewReturn('software.facility.add'),$data);
        }else{
            return redirect(url('facilities/list'));
        }
    }
    public function FacilityUpdateStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'color' => 'required',
            'icon' => 'required',
            'id' => 'required',
        ]);

        $slide = Facility::where('id', $request->input('id'))->first();
        if ($slide){
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->colour = $request->input('color');
            $slide->icon = $request->input('icon');
            $slide->save();

            return redirect(url('facilities/list'));
        }else{
            return redirect(url('facilities/list'));
        }
    }
    public function FacilityDelete($id){
        $slide = Facility::where('id', $id)->first();
        if ($slide){
            $slide->delete();

            return redirect(url('facilities/list'));
        }else{
            return redirect(url('facilities/list'));
        }
    }

    //==================Offers Methods=======================
    public function OffersList(){
//        dd('test');
        $data['data_list'] = Offers::all();
        if (count($data['data_list']) > 0){
            return view($this->ExistViewReturn('software.offers.list'), $data);
        }else{
            return redirect(url('offers/add'));
        }
    }
    public function OffersAddForm(){
        return view($this->ExistViewReturn('software.offers.add'));
    }
    public function OffersStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'icon' => 'required',
        ]);

        $slide = new Offers();
        $slide->title = $request->input('title');
        $slide->details = $request->input('details');
        $slide->icon = $request->input('icon');
        $slide->save();

        return redirect(url('offers/list'));
    }
    public function OffersEdit($id){
        $data['data'] = Offers::where('id', $id)->first();
        if ($data['data']){
            return view($this->ExistViewReturn('software.offers.add'),$data);
        }else{
            return redirect(url('offers/list'));
        }
    }
    public function OffersUpdateStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'icon' => 'required',
            'id' => 'required',
        ]);

        $slide = Offers::where('id', $request->input('id'))->first();
        if ($slide){
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->icon = $request->input('icon');
            $slide->save();

            return redirect(url('offers/list'));
        }else{
            return redirect(url('offers/list'));
        }
    }
    public function OffersDelete($id){
        $slide = Offers::where('id', $id)->first();
        if ($slide){
            $slide->delete();

            return redirect(url('offers/list'));
        }else{
            return redirect(url('offers/list'));
        }
    }


    //==================Testimonial Methods=======================
    public function TestimonialList(){
//        dd('test');
        $data['data_list'] = Testimonial::all();
//        dd('test');
        if (count($data['data_list']) > 0){
            return view($this->ExistViewReturn('software.testimonial.list'), $data);
        }else{
            return redirect(url('testimonial/add'));
        }
    }
    public function TestimonialAddForm(){
        return view($this->ExistViewReturn('software.testimonial.add'));
    }
    public function TestimonialStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'relation' => 'required',
        ]);
        $testimonial = new Testimonial();
        $testimonial->title = $request->input('title');
        $testimonial->details = $request->input('details');
        $testimonial->relation = $request->input('relation');
        $testimonial->save();

//        dd($request->all());
        if($request->hasfile('image')){
//            dd('test');
            $imageName = $testimonial->id.'.jpg';
//            dd($imageName);
            $request->image->move(public_path('/img/backend/testimonial'), $imageName);

        }
        return redirect(url('testimonial/list'));
    }
    public function TestimonialEdit($id){
        $data['data'] = Testimonial::where('id', $id)->first();
        if ($data['data']){
            return view($this->ExistViewReturn('software.testimonial.add'),$data);
        }else{
            return redirect(url('testimonial/list'));
        }
    }
    public function TestimonialUpdateStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'relation' => 'required',
            'id' => 'required',
        ]);

        $testimonial = Testimonial::where('id', $request->input('id'))->first();
        if ($testimonial){
            $testimonial->title = $request->input('title');
            $testimonial->details = $request->input('details');
            $testimonial->relation = $request->input('relation');
            $testimonial->save();

            if($request->hasfile('image')){
//            dd('test');
                $imageName = $testimonial->id.'.jpg';
//            dd($imageName);
                $request->image->move(public_path('/img/backend/testimonial'), $imageName);

            }
            return redirect(url('testimonial/list'));
        }else{
            return redirect(url('testimonial/list'));
        }
    }
    public function TestimonialDelete($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        if ($testimonial) {
            $testimonial->delete();

            return redirect(url('testimonial/list'));
        } else {
            return redirect(url('testimonial/list'));
        }
    }
    //==================Teacher Methods=======================
    public function TeacherList(){
//        dd('test');
        $data['data_list'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id','=','teacher_socials.teacher_id')->select('teacher_socials.*','teacher.*','teacher.teacher_id')->get();
        if (count($data['data_list']) > 0){
            return view($this->ExistViewReturn('software.teacher.list'), $data);
        }else{
            return redirect(url('teacher/add'));
        }
    }
    public function TeacherAddForm(){
        return view($this->ExistViewReturn('software.offers.add'));
    }
    public function TeacherEdit($id){
        $data['data'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id','=','teacher_socials.teacher_id')->where('teacher.teacher_id', $id)->first();
        if ($data['data']){
            return view($this->ExistViewReturn('software.teacher.add'),$data);
        }else{
            return redirect(url('teacher/list'));
        }
    }
    public function TeacherUpdateStore(Request $request){
        $this->validate($request, [
            'teachers_say' => 'required',
            'teacher_id' => 'required',
            'facebook' => 'sometimes',
            'twitter' => 'sometimes',
            'pinterest' => 'sometimes',
            'linkedin' => 'sometimes',
            'youtube' => 'sometimes',
        ]);

        $teacher = teacher_model::where('teacher_id', $request->input('teacher_id'))->first();
        if ($teacher){
            $teacher->teachers_say = $request->input('teachers_say');
            $teacher->save();

            $social = TeacherSocial::where('teacher_id', $request->input('teacher_id'))->first();
            if ($social){
                $social->facebook = $request->input('facebook');
                $social->twitter = $request->input('twitter');
                $social->pinterest = $request->input('pinterest');
                $social->linkedin = $request->input('linkedin');
                $social->youtube = $request->input('youtube');
                $social->save();
            }else{
                $social = new TeacherSocial();
                $social->teacher_id = $request->input('teacher_id');
                $social->facebook = $request->input('facebook');
                $social->twitter = $request->input('twitter');
                $social->pinterest = $request->input('pinterest');
                $social->linkedin = $request->input('linkedin');
                $social->youtube = $request->input('youtube');
                $social->save();
            }

            return redirect(url('teacher/list'));
        }else{
            return redirect(url('teacher/list'));
        }
    }
    public function TeacherHomePage($id){
        $teacher = teacher_model::where('teacher_id', $id)->first();
        if ($teacher){
            if ($teacher->is_homepage == 1){
                $teacher->is_homepage = 0;
            }else{
                $teacher->is_homepage = 1;
            }
            $teacher->save();

            return redirect(url('teacher/list'));
        }else{
            return redirect(url('teacher/list'));
        }
    }
    public function TeacherDelete($id){
        $slide = teacher_model::where('teacher_id', $id)->first();
        if ($slide){
            $slide->delete();

            return redirect(url('offers/list'));
        }else{
            return redirect(url('offers/list'));

        }
    }

    //==================Contactform Methods=======================
    public function ContactformList(){
//        dd('test');
        $data['data_list'] = Contactform::all();
//        dd('test');
        if (count($data['data_list']) > 0){
            return view($this->ExistViewReturn('software.contactform.list'), $data);
        }else{
            return redirect(url('contactform/add'));
        }
    }
    public function ContactformAddForm(){
        return view($this->ExistViewReturn('software.contactform.add'));
    }
    public function ContactformStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'relation' => 'required',
        ]);
        $contactform = new Contactform();
        $contactform->title = $request->input('title');
        $contactform->details = $request->input('details');
        $contactform->relation = $request->input('relation');
        $contactform->save();

//        dd($request->all());
        if($request->hasfile('image')){
//            dd('test');
            $imageName = $contactform->id.'.jpg';
//            dd($imageName);
            $request->image->move(public_path('/img/backend/contactform'), $imageName);

        }
        return redirect(url('contactform/list'));
    }
    public function ContactformEdit($id){
        $data['data'] = Contactform::where('id', $id)->first();
        if ($data['data']){
            return view($this->ExistViewReturn('software.contactform.add'),$data);
        }else{
            return redirect(url('contactform/list'));
        }
    }
    public function ContactformUpdateStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'relation' => 'required',
            'id' => 'required',
        ]);

        $contactform = Contactform::where('id', $request->input('id'))->first();
        if ($contactform){
            $contactform->title = $request->input('title');
            $contactform->details = $request->input('details');
            $contactform->relation = $request->input('relation');
            $contactform->save();

            if($request->hasfile('image')){
//            dd('test');
                $imageName = $contactform->id.'.jpg';
//            dd($imageName);
                $request->image->move(public_path('/img/backend/contactform'), $imageName);

            }
            return redirect(url('contactform/list'));
        }else{
            return redirect(url('contactform/list'));
        }
    }
    public function ContactformDelete($id)
    {
        $contactform = Contactform::where('id', $id)->first();
        if ($contactform) {
            $contactform->delete();

            return redirect(url('contactform/list'));
        } else {
            return redirect(url('contactform/list'));
        }
    }
    //==================Contactform Methods=======================
}