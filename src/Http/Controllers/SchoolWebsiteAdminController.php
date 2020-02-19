<?php


namespace Tmss\School_website\Http\Controllers;


use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\teacher_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
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
use Tmss\School_website\Http\Models\TeacherSocial;
use Tmss\School_website\Http\Models\WebsiteConfig;


class SchoolWebsiteAdminController extends Controller
{
    use PackageHelper;

    public $blade_url = '';

    public function __construct()
    {
        if (view()->exists('vendor.school_website')) {
            $this->blade_url = 'vendor.school_website.';
        } else {
            $this->blade_url = 'school_website::';
        }
    }

    public function slideList()
    {
        $data['slides'] = Slides::all();
        $data['prefix'] = 'slide';
        if (count($data['slides']) > 0) {
            return view($this->ExistViewReturn('software.slide.list'), $data);
        } else {
            return redirect(url('slide/add'));
        }
    }

    public function slideAddForm()
    {
        return view($this->blade_url . 'software.slide.add');
    }

    public function slideStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $slide = new Slides();
        $slide->title = $request->input('title');
        $slide->details = $request->input('details');
        $slide->save();

        if ($request->hasfile('image')) {
            $imageName = $slide->id . '.jpg';
            $request->image->move(public_path('/img/backend/slide'), $imageName);

        }
        return redirect(url('slide/list'));
    }

    public function slideUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'id' => 'required',
        ]);

        $slide = Slides::where('id', $request->input('id'))->first();
        if ($slide) {
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->save();

            if ($request->hasfile('image')) {
                $imageName = $slide->id . '.jpg';
                $request->image->move(public_path('/img/backend/slide'), $imageName);

            }
            return redirect(url('slide/list'));
        } else {
            return redirect(url('slide/list'));
        }
    }

    public function SlideEdit($id)
    {
        $data['slide'] = Slides::where('id', $id)->first();
        if ($data['slide']) {
            return view($this->blade_url . 'software.slide.add', $data);
        } else {
            return redirect(url('slide/list'));
        }
    }

    public function SlideDelete($id)
    {
        $slide = Slides::where('id', $id)->first();
        if ($slide) {
            $slide->delete();

            return redirect(url('slide/list'));
        } else {
            return redirect(url('slide/list'));
        }
    }

    //==================Facility Methods=======================
    public function FacilityList()
    {
        $data['data_list'] = Facility::all();
        $data['prefix'] = 'facility';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.facility.list'), $data);
        } else {
            return redirect(url('facilities/add'));
        }
    }

    public function FacilityAddForm()
    {
        return view($this->ExistViewReturn('software.facility.add'));
    }

    public function FacilityStore(Request $request)
    {
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

    public function FacilityEdit($id)
    {
        $data['data'] = Facility::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.facility.add'), $data);
        } else {
            return redirect(url('facilities/list'));
        }
    }

    public function FacilityUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'color' => 'required',
            'icon' => 'required',
            'id' => 'required',
        ]);

        $slide = Facility::where('id', $request->input('id'))->first();
        if ($slide) {
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->colour = $request->input('color');
            $slide->icon = $request->input('icon');
            $slide->save();

            return redirect(url('facilities/list'));
        } else {
            return redirect(url('facilities/list'));
        }
    }

    public function FacilityDelete($id)
    {
        $slide = Facility::where('id', $id)->first();
        if ($slide) {
            $slide->delete();

            return redirect(url('facilities/list'));
        } else {
            return redirect(url('facilities/list'));
        }
    }

    //==================Offers Methods=======================
    public function OffersList()
    {
//        dd('test');
        $data['data_list'] = Offers::all();
        $data['prefix'] = 'offer';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.offers.list'), $data);
        } else {
            return redirect(url('offers/add'));
        }
    }

    public function OffersAddForm()
    {
        return view($this->ExistViewReturn('software.offers.add'));
    }

    public function OffersStore(Request $request)
    {
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

    public function OffersEdit($id)
    {
        $data['data'] = Offers::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.offers.add'), $data);
        } else {
            return redirect(url('offers/list'));
        }
    }

    public function OffersUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'icon' => 'required',
            'id' => 'required',
        ]);

        $slide = Offers::where('id', $request->input('id'))->first();
        if ($slide) {
            $slide->title = $request->input('title');
            $slide->details = $request->input('details');
            $slide->icon = $request->input('icon');
            $slide->save();

            return redirect(url('offers/list'));
        } else {
            return redirect(url('offers/list'));
        }
    }

    public function OffersDelete($id)
    {
        $slide = Offers::where('id', $id)->first();
        if ($slide) {
            $slide->delete();

            return redirect(url('offers/list'));
        } else {
            return redirect(url('offers/list'));
        }
    }


    //==================Testimonial Methods=======================
    public function TestimonialList()
    {
//        dd('test');
        $data['data_list'] = Testimonial::all();
        $data['prefix'] = 'testimonial';
//        dd('test');
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.testimonial.list'), $data);
        } else {
            return redirect(url('testimonial/add'));
        }
    }

    public function TestimonialAddForm()
    {
        return view($this->ExistViewReturn('software.testimonial.add'));
    }

    public function TestimonialStore(Request $request)
    {
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
        if ($request->hasfile('image')) {
//            dd('test');
            $imageName = $testimonial->id . '.jpg';
//            dd($imageName);
            $request->image->move(public_path('/img/backend/testimonial'), $imageName);

        }
        return redirect(url('testimonial/list'));
    }

    public function TestimonialEdit($id)
    {
        $data['data'] = Testimonial::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.testimonial.add'), $data);
        } else {
            return redirect(url('testimonial/list'));
        }
    }

    public function TestimonialUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'relation' => 'required',
            'id' => 'required',
        ]);

        $testimonial = Testimonial::where('id', $request->input('id'))->first();
        if ($testimonial) {
            $testimonial->title = $request->input('title');
            $testimonial->details = $request->input('details');
            $testimonial->relation = $request->input('relation');
            $testimonial->save();

            if ($request->hasfile('image')) {
                $imageName = $testimonial->id . '.jpg';
                $request->image->move(public_path('/img/backend/testimonial'), $imageName);

            }
            return redirect(url('testimonial/list'));
        } else {
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
    public function TeacherList()
    {
//        dd('test');
        $data['data_list'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id', '=', 'teacher_socials.teacher_id')->select('teacher_socials.*', 'teacher.*', 'teacher.teacher_id')->get();
        $data['prefix'] = 'teacher';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.teacher.list'), $data);
        } else {
            return redirect(url('teacher/add'));
        }
    }

    public function TeacherAddForm()
    {
        return view($this->ExistViewReturn('software.offers.add'));
    }

    public function TeacherEdit($id)
    {
        $data['data'] = teacher_model::leftJoin('teacher_socials', 'teacher.teacher_id', '=', 'teacher_socials.teacher_id')->where('teacher.teacher_id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.teacher.add'), $data);
        } else {
            return redirect(url('teacher/list'));
        }
    }

    public function TeacherUpdateStore(Request $request)
    {
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
        if ($teacher) {
            $teacher->teachers_say = $request->input('teachers_say');
            $teacher->save();

            $social = TeacherSocial::where('teacher_id', $request->input('teacher_id'))->first();
            if ($social) {
                $social->facebook = $request->input('facebook');
                $social->twitter = $request->input('twitter');
                $social->pinterest = $request->input('pinterest');
                $social->linkedin = $request->input('linkedin');
                $social->youtube = $request->input('youtube');
                $social->save();
            } else {
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
        } else {
            return redirect(url('teacher/list'));
        }
    }

    public function TeacherHomePage($id)
    {
        $teacher = teacher_model::where('teacher_id', $id)->first();
        if ($teacher) {
            if ($teacher->is_homepage == 1) {
                $teacher->is_homepage = 0;
            } else {
                $teacher->is_homepage = 1;
            }
            $teacher->save();

            return redirect(url('teacher/list'));
        } else {
            return redirect(url('teacher/list'));
        }
    }

    public function TeacherDelete($id)
    {
        $slide = teacher_model::where('teacher_id', $id)->first();
        if ($slide) {
            $slide->delete();

            return redirect(url('offers/list'));
        } else {
            return redirect(url('offers/list'));

        }
    }

    //==================Contactform Methods=======================
    public function ContactformList()
    {
        $data['data_list'] = Contactform::all();
        $data['prefix'] = 'contact';
//        dd('test');
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.contactform.list'), $data);
        } else {
            return view($this->ExistViewReturn('software.contactform.list'), $data);
        }
    }

    public function ContactformStore(Request $request)
    {
        $input = $request->input('data');
        $validate = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => 3000, 'errors' => $validate->errors()], 200);
        }

        $contactform = new Contactform();
        $contactform->firstname = $input['firstname'];
        $contactform->lastname = $input['lastname'];
        $contactform->phone = $input['phone'];
        $contactform->subject = $input['subject'];
        $contactform->message = $input['message'];
        $contactform->save();

        return response()->json(['status' => 2000, 'msg' => Config::get('school_website.contact_message', 'Thank you For your Quote')], 200);
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

    //==================News Methods=======================
    public function NewsList()
    {
        $data['data_list'] = News::all();
        $data['prefix'] = 'news';
//        dd('test');
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.news.list'), $data);
        } else {
            return redirect(url('news/add'));
        }
    }

    public function NewsAddForm()
    {
        return view($this->ExistViewReturn('software.news.add'));
    }

    public function NewsStore(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'details' => 'required',
        ]);
        $news = new News();
        $news->topic = $request->input('topic');
        $news->details = $request->input('details');
        $news->save();

        if ($request->hasfile('image')) {
            $imageName = $news->id . '.jpg';
            $request->image->move(public_path('/img/backend/news'), $imageName);

        }

        return redirect(url('news/list'));
    }

    public function NewsEdit($id)
    {
        $data['data'] = News::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.news.add'), $data);
        } else {
            return redirect(url('news/list'));
        }
    }

    public function NewsUpdateStore(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'details' => 'required',
            'id' => 'required',
        ]);

        $news = News::where('id', $request->input('id'))->first();
        if ($news) {
            $news->topic = $request->input('topic');
            $news->details = $request->input('details');
            $news->save();

            if ($request->hasfile('image')) {
                $imageName = $news->id . '.jpg';
                $request->image->move(public_path('/img/backend/news'), $imageName);

            }

            return redirect(url('news/list'));
        } else {
            return redirect(url('news/list'));
        }
    }

    public function NewsDelete($id)
    {
        $news = News::where('id', $id)->first();
        if ($news) {
            $news->delete();

            return redirect(url('news/list'));
        } else {
            return redirect(url('news/list'));
        }
    }

    //==================Subscribe Methods=======================
    public function SubscribeList()
    {
        $data['data_list'] = Subscribe::all();
        $data['prefix'] = 'subscribe';
//        dd('test');
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.subscribe.list'), $data);
        } else {
            return view($this->ExistViewReturn('software.subscribe.list'), $data);
        }
    }

    public function SubscribeStore(Request $request)
    {
        $input = $request->input('data');
        $validate = Validator::make($input, [
            'email' => 'required',
        ]);
        $subscribe = new Subscribe();
        $subscribe->email = $input['email'];
        $subscribe->save();

        return response()->json(['status' => 2000, 'msg' => Config::get('school_website.subscribe_message', 'Thank you For Stay With Us')], 200);
    }

    public function SubscribeDelete($id)
    {
        $subscribe = Subscribe::where('id', $id)->first();
        if ($subscribe) {
            $subscribe->delete();

            return redirect(url('subscribe/list'));
        } else {
            return redirect(url('subscribe/list'));
        }
    }

    //==================Photocategory Methods=======================
    public function PhotocategoryList()
    {
        $data['data_list'] = Photocategory::all();
        $data['prefix'] = 'photocategory';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.photocategory.list'), $data);
        } else {
            return redirect(url('photocategory/add'));
        }
    }

    public function PhotocategoryAddForm()
    {
        return view($this->ExistViewReturn('software.photocategory.add'));
    }

    public function PhotocategoryStore(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'details' => 'required',
        ]);
        $photocategory = new Photocategory();
        $photocategory->topic = $request->input('topic');
        $photocategory->details = $request->input('details');
        $photocategory->save();

        return redirect(url('photocategory/list'));
    }

    public function PhotocategoryEdit($id)
    {
        $data['data'] = Photocategory::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.photocategory.add'), $data);
        } else {
            return redirect(url('photocategory/list'));
        }
    }

    public function PhotocategoryUpdateStore(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'details' => 'required',
        ]);

        $photocategory = Photocategory::where('id', $request->input('id'))->first();
        if ($photocategory) {
            $photocategory->topic = $request->input('topic');
            $photocategory->details = $request->input('details');
            $photocategory->save();

            return redirect(url('photocategory/list'));
        } else {
            return redirect(url('photocategory/list'));
        }
    }

    public function PhotocategoryDelete($id)
    {
        $photocategory = Photocategory::where('id', $id)->first();
        if ($photocategory) {
            $photocategory->delete();

            return redirect(url('photocategory/list'));
        } else {
            return redirect(url('photocategory/list'));
        }
    }

    //==================Photogallery Methods=======================
    public function PhotogalleryList()
    {
        $data['data_list'] = Photogallery::leftJoin('photocategory','photogallery.photocategory','=','photocategory.id')->select('photogallery.*','photocategory.topic as categoryname')->get();
        $data['prefix'] = 'photogallery';
//        dd($data['data_list']);
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.photogallery.list'), $data);
        } else {
            return redirect(url('photogallery/add'));
        }
    }

    public function PhotogalleryAddForm()
    {
        $data['data_list'] = Photocategory::all();
        return view($this->ExistViewReturn('software.photogallery.add'), $data);
    }

    public function PhotogalleryStore(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'topic' => 'required',
            'photocategory' => 'required',
            'details' => 'required',
        ]);

        $photogallery = new Photogallery();

        $photogallery->topic = $request->input('topic');
        $photogallery->photocategory = $request->input('photocategory');
        $photogallery->details = $request->input('details');
        $photogallery->save();
        if ($request->hasfile('image')) {
            $imageName = $photogallery->id . '.jpg';
            $request->image->move(public_path('/img/backend/photogallery'), $imageName);

        }

        return redirect(url('photogallery/list'));
    }

    public function PhotogalleryEdit($id)
    {
        $data['data_list'] = Photocategory::all();
        $data['data'] = Photogallery::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.photogallery.add'), $data);
        } else {
            return redirect(url('photogallery/list'));
        }
    }

    public function PhotogalleryUpdateStore(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'photocategory' => 'required',
            'details' => 'required',
        ]);

        $photogallery = Photogallery::where('id', $request->input('id'))->first();
        if ($photogallery) {
            $photogallery->topic = $request->input('topic');
            $photogallery->photocategory = $request->input('photocategory');
            $photogallery->details = $request->input('details');
            $photogallery->save();
            if ($request->hasfile('image')) {
                $imageName = $photogallery->id . '.jpg';
                $request->image->move(public_path('/img/backend/photogallery'), $imageName);

            }

            return redirect(url('photogallery/list'));
        } else {
            return redirect(url('photogallery/list'));
        }
    }

    public function PhotogalleryDelete($id)
    {
        $photogallery = Photogallery::where('id', $id)->first();
        if ($photogallery) {
            $photogallery->delete();

            return redirect(url('photogallery/list'));
        } else {
            return redirect(url('photogallery/list'));
        }
    }

    //==================Socialmedia Methods=======================

    public function SocialmediaList()
    {
        $data['data_list'] = Socialmedia::all();
        $data['prefix'] = 'socialmedia';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.socialmedia.list'), $data);
        } else {
            return redirect(url('socialmedia/add'));
        }
    }

    public function SocialmediaAddForm()
    {
        return view($this->ExistViewReturn('software.socialmedia.add'));
    }

    public function SocialmediaStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'icon' => 'required',
        ]);
        $socialmedia = new Socialmedia();
        $socialmedia->title = $request->input('title');
        $socialmedia->details = $request->input('details');
        $socialmedia->icon = $request->input('icon');
        $socialmedia->save();

        return redirect(url('socialmedia/list'));
    }

    public function SocialmediaEdit($id)
    {
        $data['data'] = Socialmedia::where('id', $id)->first();
        if ($data['data']) {
            return view($this->ExistViewReturn('software.socialmedia.add'), $data);
        } else {
            return redirect(url('socialmedia/list'));
        }
    }

    public function SocialmediaUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'icon' => 'required',
            'id' => 'required',
        ]);

        $socialmedia = Socialmedia::where('id', $request->input('id'))->first();
        if ($socialmedia) {
            $socialmedia->title = $request->input('title');
            $socialmedia->details = $request->input('details');
            $socialmedia->icon = $request->input('icon');
            $socialmedia->save();

            return redirect(url('socialmedia/list'));
        } else {
            return redirect(url('socialmedia/list'));
        }
    }

    public function SocialmediaDelete($id)
    {
        $socialmedia = Socialmedia::where('id', $id)->first();
        if ($socialmedia) {
            $socialmedia->delete();

            return redirect(url('socialmedia/list'));
        } else {
            return redirect(url('socialmedia/list'));
        }
    }


    //==================Page Methods=======================
    public function PageList()
    {
        $data['data_list'] = Page::orderBy('sort','ASC')->get();
        $data['prefix'] = 'page';
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.page.list'), $data);
        } else {
            return redirect(url('page/add'));
        }
    }

    public function PageAddForm()
    {
        $data['pages'] = Page::all();
        return view($this->ExistViewReturn('software.page.add'), $data);
    }

    public function PageStore(Request $request)
    {

//        dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'url' => 'sometimes',
            'description' => 'sometimes',
            'template' => 'sometimes',
            'is_menu' => 'sometimes',
            'position' => 'sometimes',
            'parent' => 'sometimes',
        ]);

//        dd('test');
        $page = new Page();
        $page->title = $request->input('title');
        $page->url = str_replace(' ', '-', mb_strtolower($request->input('title')));
        $page->description = $request->input('description');
        $page->template = $request->input('template');
        $page->is_menu = $request->input('is_menu');
        $page->position = $request->input('position');
        $page->parent = $request->input('parent');
        $page->save();
        if ($request->hasfile('image')) {
            $imageName = $page->id . '.jpg';
            $request->image->move(public_path('/img/backend/page'), $imageName);

        }

        return redirect(url('page/list'));
    }

    public function PageEdit($id)
    {
        $data['pages'] = Page::get();
        $data['data'] = Page::where('id', $id)->first();
//        dd($data['pages']);
        if ($data['pages']) {
            return view($this->ExistViewReturn('software.page.add'), $data);
        } else {
            return redirect(url('page/list'));
        }
    }

    public function PageUpdateStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'sometimes',
            'description' => 'sometimes',
            'template' => 'sometimes',
            'is_menu' => 'sometimes',
            'position' => 'sometimes',
            'parent' => 'sometimes',
            'id' => 'required',
        ]);

        $page = Page::where('id', $request->input('id'))->first();
        if ($page) {
            $page->title = $request->input('title');
            $page->url = str_replace(' ', '-', mb_strtolower($request->input('title')));
            $page->description = $request->input('description');
            $page->template = $request->input('template');
            $page->is_menu = $request->input('is_menu');
            $page->position = $request->input('position');
            $page->parent = $request->input('parent') ? $request->input('parent') : 0;
            $page->save();
            if ($request->hasfile('image')) {
                $imageName = $page->id . '.jpg';
                $request->image->move(public_path('/img/backend/page'), $imageName);

            }

            return redirect(url('page/list'));
        } else {
            return redirect(url('page/list'));
        }
    }
    public function PageUpdateSort(Request $request)
    {
        $this->validate($request, [
            'all_data' => 'required|array',
        ]);

        $input = $request->input('all_data');

        foreach ($input as $id){
            $page = Page::where('id', $id['id'])->first();
            if ($page){
                $page->sort = $id['sort_id'];
                $page->save();
            }
        }
        return response()->json(['status'=>2000, 'msg'=>'Successfully Updated']);
    }

    public function PageDelete($id)
    {
        $page = Page::where('id', $id)->first();
        if ($page) {
            $page->delete();

            return redirect(url('page/list'));
        } else {
            return redirect(url('page/list'));
        }
    }


    //==================Page Methods=======================
    public function MenuList()
    {
        $all_parent = Page::where('is_menu', 1)->where('position', 'main_menu')->where('parent', 0)->orderBy('sort','ASC')->select('title','id')->get()->toArray();
        $all_data = [];

        foreach ($all_parent as $key => $parent){
            $all_data[$key] = $parent;
            $all_data[$key]['submenu'] = Page::where('parent', $parent['id'])->orderBy('sort','ASC')->select('title','id')->get()->toArray();

            foreach ($all_data[$key]['submenu'] as $key2 => $child){
                $all_data[$key]['submenu'][$key2]['subsubmenu'] = Page::where('parent', $child['id'])->orderBy('sort','ASC')->select('title','id')->get()->toArray();
            }

        }
        if (count($all_data) > 0) {
            return view($this->ExistViewReturn('software.menu.list'), ['data'=>$all_data]);
        } else {
            return redirect(url('page/list'));
        }
    }
    public function MenuUpdateStore(Request $request)
    {
        $this->validate($request, [
            'data' => 'required|array',
        ]);
        $input = $request->input('data');

        foreach ($input as $key => $menu){
           // dd($input);
            $page = Page::where('id', $menu['id'])->first();
            $page->parent = 0;
            $page->sort = $key+1;
            $page->save();

            if (isset($menu['children'])){
                foreach ($menu['children'] as $submenu){
                    $page = Page::where('id', $submenu['id'])->first();
                    $page->parent = $menu['id'];
                    $page->save();

                    if (isset($submenu['children'])){
                        foreach ($submenu['children'] as $sub_sub_menu){
                            $page = Page::where('id', $sub_sub_menu['id'])->first();
                            $page->parent = $submenu['id'];
                            $page->save();
                        }
                    }
                }
            }
        }

        $all_parent = Page::where('is_menu', 1)->where('position', 'main_menu')->where('parent', 0)->orderBy('sort','ASC')->select('title','id','url')->get()->toArray();
        $all_data = [];

        foreach ($all_parent as $key => $parent){
            $all_data[$key] = $parent;
            $all_data[$key]['submenu'] = Page::where('parent', $parent['id'])->orderBy('sort','ASC')->select('title','id','url')->get()->toArray();

            foreach ($all_data[$key]['submenu'] as $key2 => $child){
                $all_data[$key]['submenu'][$key2]['subsubmenu'] = Page::where('parent', $child['id'])->orderBy('sort','ASC')->select('title','id','url')->get()->toArray();
            }
        }

        Cache::forget('menus');
        Cache::rememberForever('menus', function () use ($all_data) {
            return $all_data;
        });

        return response()->json(['status'=>2000, 'msg'=>'Successfully Updated']);

    }
    public function MenuDelete($id)
    {
        $page = Page::where('id', $id)->first();
        if ($page) {
            $page->delete();

            return redirect(url('page/list'));
        } else {
            return redirect(url('page/list'));
        }
    }

    //==================Faculty Methods=======================
    public function FacultyList()
    {
        $val = Faculty::where('type', 1)->leftJoin('manage_department', 'faculty.coursecode', '=', 'manage_department.department_code')->select('faculty.*', 'manage_department.department_name','manage_department.department_code')->get();

//        dd($val);
        $data['data_list']=$val->unique('department_code');
        $data['prefix'] = 'faculty';

//        $data['data_list'] = Faculty::all();
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.faculty.list'), $data);
        } else {
            return redirect(url('faculty/add'));
        }
    }

    public function FacultyAddForm()
    {
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');
        $data['page'] = 'short_course';

        return view($this->ExistViewReturn('software.faculty.add'), $data);
    }

    public function FacultyStore(Request $request)
    {

//        dd($request->all());
        $this->validate($request, [
            'coursecode' => 'sometimes',
            'overview' => 'sometimes',
            'feature' => 'sometimes',
            'scope' => 'sometimes',
            'subject' => 'sometimes',
            'labinfo' => 'sometimes',
            'fees' => 'sometimes',
            'fees_structure' => 'sometimes',
            'duration' => 'sometimes',
        ]);

//        dd('test');
        $faculty = new Faculty();
        $faculty->type = 1;
        $faculty->coursecode = $request->input('coursecode');
        $faculty->overview = $request->input('overview');
        $faculty->feature = $request->input('feature');
        $faculty->scope = $request->input('scope');
        $faculty->subject = $request->input('subject');
        $faculty->labinfo = $request->input('labinfo');
        $faculty->fees = $request->input('fees');
        $faculty->fees_structure = $request->input('fees_structure');
        $faculty->duration = $request->input('duration');
        $faculty->save();
        if ($request->hasfile('image')) {
            $imageName = $faculty->id . '.jpg';
            $request->image->move(public_path('/img/backend/faculty'), $imageName);

        }

        return redirect(url('faculty/list'));
    }

    public function FacultyEdit($id)
    {
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');

        $data['data'] = Faculty::where('id', $id)->first();
//        dd($data['facultys']);
        if ($data['courses']) {
            return view($this->ExistViewReturn('software.faculty.add'), $data);
        } else {
            return redirect(url('faculty/list'));
        }
    }

    public function FacultyUpdateStore(Request $request)
    {
        $this->validate($request, [
            'coursecode' => 'sometimes',
            'overview' => 'sometimes',
            'feature' => 'sometimes',
            'scope' => 'sometimes',
            'subject' => 'sometimes',
            'labinfo' => 'sometimes',
            'fees' => 'sometimes',
            'fees_structure' => 'sometimes',
            'id' => 'required',
            'duration' => 'sometimes',
        ]);

        $faculty = Faculty::where('id', $request->input('id'))->first();
        if ($faculty) {
            $faculty->coursecode = $request->input('coursecode');
            $faculty->overview = $request->input('overview');
            $faculty->feature = $request->input('feature');
            $faculty->scope = $request->input('scope');
            $faculty->subject = $request->input('subject');
            $faculty->labinfo = $request->input('labinfo');
            $faculty->fees = $request->input('fees');
            $faculty->fees_structure = $request->input('fees_structure');
            $faculty->duration = $request->input('duration');
            $faculty->save();
            if ($request->hasfile('image')) {
                $imageName = $faculty->id . '.jpg';
                $request->image->move(public_path('/img/backend/faculty'), $imageName);

            }

            return redirect(url('faculty/list'));
        } else {
            return redirect(url('faculty/list'));
        }
    }

    public function FacultyDelete($id)
    {
        $faculty = Faculty::where('id', $id)->first();
        if ($faculty) {
            $faculty->delete();

            return redirect(url('faculty/list'));
        } else {
            return redirect(url('faculty/list'));
        }
    }


    //==================Faculty Methods=======================
    public function ShortCourseList()
    {
        $val = Faculty::where('type', 2)->get();

//        dd($val);
        $data['data_list']=$val->unique('department_code');
        $data['prefix'] = 'short_course';

//        $data['data_list'] = Faculty::all();
        if (count($data['data_list']) > 0) {
            return view($this->ExistViewReturn('software.short_course.list'), $data);
        } else {
            return redirect(url('short_course/add'));
        }
    }

    public function ShortCourseAdd()
    {
        $courses = manage_department_model::all()->toArray();
        $data['courses'] = collect($courses)->unique('department_code');

        return view($this->ExistViewReturn('software.short_course.add'), $data);
    }

    public function ShortCourseAddStore(Request $request)
    {
        $this->validate($request, [
            'coursecode' => 'sometimes',
            'overview' => 'sometimes',
            'feature' => 'sometimes',
            'scope' => 'sometimes',
            'subject' => 'sometimes',
            'labinfo' => 'sometimes',
            'duration' => 'sometimes',
            'fees' => 'sometimes',
            'fees_structure' => 'sometimes',
        ]);
        $faculty = new Faculty();
        $faculty->type = 2;
        $faculty->coursecode = $request->input('coursecode');
        $faculty->overview = $request->input('overview');
        $faculty->feature = $request->input('feature');
        $faculty->scope = $request->input('scope');
        $faculty->subject = $request->input('subject');
        $faculty->labinfo = $request->input('labinfo');
        $faculty->fees = $request->input('fees');
        $faculty->fees_structure = $request->input('fees_structure');
        $faculty->duration = $request->input('duration');
        $faculty->save();
        if ($request->hasfile('image')) {
            $imageName = $faculty->id . '.jpg';
            $request->image->move(public_path('/img/backend/faculty'), $imageName);

        }

        return redirect(url('short_course/list'));
    }

    public function ShortCourseUpdate($id)
    {
        $data['data'] = Faculty::where('id', $id)->first();
//        dd($data['facultys']);
        if ($data['data']) {
            return view($this->ExistViewReturn('software.short_course.add'), $data);
        } else {
            return redirect(url('faculty/list'));
        }
    }

    public function ShortCourseUpdateSave(Request $request)
    {
        $this->validate($request, [
            'coursecode' => 'sometimes',
            'overview' => 'sometimes',
            'feature' => 'sometimes',
            'scope' => 'sometimes',
            'subject' => 'sometimes',
            'labinfo' => 'sometimes',
            'fees' => 'sometimes',
            'fees_structure' => 'sometimes',
            'id' => 'required',
            'duration' => 'sometimes',
        ]);

        $faculty = Faculty::where('id', $request->input('id'))->first();
        if ($faculty) {
            $faculty->coursecode = $request->input('coursecode');
            $faculty->overview = $request->input('overview');
            $faculty->feature = $request->input('feature');
            $faculty->scope = $request->input('scope');
            $faculty->subject = $request->input('subject');
            $faculty->labinfo = $request->input('labinfo');
            $faculty->fees = $request->input('fees');
            $faculty->fees_structure = $request->input('fees_structure');
            $faculty->duration = $request->input('duration');
            $faculty->save();
            if ($request->hasfile('image')) {
                $imageName = $faculty->id . '.jpg';
                $request->image->move(public_path('/img/backend/faculty'), $imageName);

            }

            return redirect(url('short_course/list'));
        } else {
            return redirect(url('short_course/list'));
        }
    }

    public function ShortCourseDelete($id)
    {
        $faculty = Faculty::where('id', $id)->first();
        if ($faculty) {
            $faculty->delete();

            return redirect(url('faculty/list'));
        } else {
            return redirect(url('faculty/list'));
        }
    }

    //==================Website_configs Methods=======================
    public function WebsiteConfigsAddForm()
    {
        return view($this->ExistViewReturn('software.config.add'));
    }

    public function WebsiteConfigsStore(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required',
            'display_name' => 'required',
            'value' => 'required',
        ]);

        if ($request->input('type') == 'file'){
            if ($request->hasfile('value')) {
                $imageName = time(). '_'.$request->input('name').'.jpg';
                $request->value->move(public_path('/img/backend/config'), $imageName);
            }
        }

        $faculty = new WebsiteConfig();
        $faculty->type = $request->input('type');
        $faculty->name = $request->input('name');
        $faculty->display_name = $request->input('display_name');
        $faculty->value = $request->input('type') == 'file' ? $imageName : $request->input('value');
        $faculty->save();

        return redirect(url('website_configs/list'));
    }

    public function WebsiteConfigList(){
        $data['title'] = 'Configuration List';
        $data['data_list'] = WebsiteConfig::all();
        $data['prefix'] = 'config';
        return view($this->ExistViewReturn('software.config.list'), $data);
    }

    public function WebsiteConfigsEdit($id){

        $data['title'] = 'Configuration Edit';
        $data['data'] = WebsiteConfig::where('id', $id)->first();
        return view($this->ExistViewReturn('software.config.add'), $data);
    }

    public function WebsiteConfigsUpdateStore(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required',
            'display_name' => 'required',
            'value' => 'required',
            'id' => 'required',
        ]);
        $config = WebsiteConfig::where('id', $request->input('id'))->first();

        if ($request->input('type') == 'file'){
            if ($request->hasfile('value')) {
                $imageName = time(). '_'.$request->input('name').'.jpg';
                $request->value->move(public_path('/img/backend/config'), $imageName);
            }else{
                $imageName = $config->value;
            }
        }

        if ($config){
            $config->type = $request->input('type');
            $config->name = $request->input('name');
            $config->display_name = $request->input('display_name');
            $config->value = $request->input('type') == 'file' ? $imageName : $request->input('value');
            $config->save();

            return redirect(url('website_configs/list'));
        }else{
            return redirect(url('website_configs/list'));
        }
    }
    public function WebsiteConfigsDelete($id)
    {
        $faculty = WebsiteConfig::where('id', $id)->first();
        if ($faculty) {
            $faculty->delete();

            return redirect(url('website_configs/list'));
        } else {
            return redirect(url('website_configs/list'));
        }
    }
}