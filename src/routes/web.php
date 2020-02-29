<?php
Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Tmss\School_website\Http\Controllers'], function () {
    Route::group(['prefix'=>'slide'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@slideList');
        Route::get('/add', 'SchoolWebsiteAdminController@slideAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@slideStore');
        Route::post('/update', 'SchoolWebsiteAdminController@slideUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@SlideEdit');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@SlideDelete');
    });
    Route::group(['prefix'=>'facilities'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@FacilityList');
        Route::get('/add', 'SchoolWebsiteAdminController@FacilityAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@FacilityStore');
        Route::post('/update', 'SchoolWebsiteAdminController@FacilityUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@FacilityEdit');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@FacilityDelete');
    });
    Route::group(['prefix'=>'offers'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@OffersList');
        Route::get('/add', 'SchoolWebsiteAdminController@OffersAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@OffersStore');
        Route::post('/update', 'SchoolWebsiteAdminController@OffersUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@OffersEdit');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@OffersDelete');
    });
    Route::group(['prefix'=>'testimonial'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@TestimonialList');
        Route::get('/add', 'SchoolWebsiteAdminController@TestimonialAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@TestimonialStore');
        Route::post('/update', 'SchoolWebsiteAdminController@TestimonialUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@TestimonialEdit');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@TestimonialDelete');
    });
    Route::group(['prefix'=>'teacher'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@TeacherList');
        Route::get('/add', 'SchoolWebsiteAdminController@TeacherAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@TeacherStore');
        Route::post('/update', 'SchoolWebsiteAdminController@TeacherUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@TeacherEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@TeacherHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@TeacherDelete');
    });
    Route::group(['prefix'=>'contactform'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@ContactformList');
        Route::get('/add', 'SchoolWebsiteAdminController@ContactformAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@ContactformStore');
        Route::post('/update', 'SchoolWebsiteAdminController@ContactformUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@ContactformEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@ContactformHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@ContactformDelete');
    });
    Route::group(['prefix'=>'subscribe'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@SubscribeList');
        Route::get('/add', 'SchoolWebsiteAdminController@SubscribeAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@SubscribeStore');
        Route::post('/update', 'SchoolWebsiteAdminController@SubscribeUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@SubscribeEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@SubscribeHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@SubscribeDelete');
    });
    Route::group(['prefix'=>'photocategory'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@PhotocategoryList');
        Route::get('/add', 'SchoolWebsiteAdminController@PhotocategoryAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@PhotocategoryStore');
        Route::post('/update', 'SchoolWebsiteAdminController@PhotocategoryUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@PhotocategoryEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@PhotocategoryHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@PhotocategoryDelete');
    });
    Route::group(['prefix'=>'photogallery'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@PhotogalleryList');
        Route::get('/add', 'SchoolWebsiteAdminController@PhotogalleryAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@PhotogalleryStore');
        Route::post('/update', 'SchoolWebsiteAdminController@PhotogalleryUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@PhotogalleryEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@PhotogalleryHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@PhotogalleryDelete');
    });
    Route::group(['prefix'=>'socialmedia'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@SocialmediaList');
        Route::get('/add', 'SchoolWebsiteAdminController@SocialmediaAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@SocialmediaStore');
        Route::post('/update', 'SchoolWebsiteAdminController@SocialmediaUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@SocialmediaEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@SocialmediaHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@SocialmediaDelete');
    });
    Route::group(['prefix'=>'page'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@PageList');
        Route::get('/add', 'SchoolWebsiteAdminController@PageAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@PageStore');
        Route::post('/update', 'SchoolWebsiteAdminController@PageUpdateStore');
        Route::post('/sort/update', 'SchoolWebsiteAdminController@PageUpdateSort');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@PageEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@PageHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@PageDelete');
    });
    Route::group(['prefix'=>'news'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@NewsList');
        Route::get('/add', 'SchoolWebsiteAdminController@NewsAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@NewsStore');
        Route::post('/update', 'SchoolWebsiteAdminController@NewsUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@NewsEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@NewsHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@NewsDelete');
    });
    Route::group(['prefix'=>'registration'], function () {
        Route::get('/list', 'SchoolWebsiteAdminController@RegistrationList');
    });
    Route::group(['prefix'=>'page'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@PageList');
        Route::get('/add', 'SchoolWebsiteAdminController@PageAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@PageStore');
        Route::post('/update', 'SchoolWebsiteAdminController@PageUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@PageEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@PageHomePage');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@PageDelete');
    });
    Route::group(['prefix'=>'menu'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@MenuList');
        Route::post('/update', 'SchoolWebsiteAdminController@MenuUpdateStore');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@MenuDelete');
    });
    Route::group(['prefix'=>'faculty'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@FacultyList');
        Route::get('/add', 'SchoolWebsiteAdminController@FacultyAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@FacultyStore');
        Route::post('/update', 'SchoolWebsiteAdminController@FacultyUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@FacultyEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@FacultyHomeFaculty');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@FacultyDelete');
    });
    Route::group(['prefix'=>'website_configs'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@WebsiteConfigList');
        Route::get('/add', 'SchoolWebsiteAdminController@WebsiteConfigsAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@WebsiteConfigsStore');
        Route::post('/update', 'SchoolWebsiteAdminController@WebsiteConfigsUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@WebsiteConfigsEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@WebsiteConfigsHomeWebsite_configs');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@WebsiteConfigsDelete');
    });
    Route::group(['prefix'=>'short_course'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@ShortCourseList');
        Route::get('/add', 'SchoolWebsiteAdminController@ShortCourseAdd');
        Route::post('/add', 'SchoolWebsiteAdminController@ShortCourseAddStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@ShortCourseUpdate');
        Route::post('/update', 'SchoolWebsiteAdminController@ShortCourseUpdateSave');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@ShortCourseDelete');
    });
    Route::group(['prefix'=>'routine'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@ShortCourseList');
        Route::get('/add', 'SchoolWebsiteAdminController@ShortCourseAdd');
        Route::post('/add', 'SchoolWebsiteAdminController@ShortCourseAddStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@ShortCourseUpdate');
        Route::post('/update', 'SchoolWebsiteAdminController@ShortCourseUpdateSave');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@ShortCourseDelete');
    });
    Route::group(['prefix'=>'event'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@ShortCourseList');
        Route::get('/add', 'SchoolWebsiteAdminController@ShortCourseAdd');
        Route::post('/add', 'SchoolWebsiteAdminController@ShortCourseAddStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@ShortCourseUpdate');
        Route::post('/update', 'SchoolWebsiteAdminController@ShortCourseUpdateSave');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@ShortCourseDelete');
    });
    Route::group(['prefix'=>'notice'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@NoticeList');
        Route::get('/add', 'SchoolWebsiteAdminController@NoticeAdd');
        Route::post('/add', 'SchoolWebsiteAdminController@NoticeAddStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@NoticeUpdate');
        Route::post('/update', 'SchoolWebsiteAdminController@NoticeUpdateSave');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@NoticeDelete');
    });

    Route::group(['prefix'=>'view'], function (){
        Route::post('/slide/{id}', 'WebsiteDataViewApiController@SlideDataView');
        Route::post('/facility/{id}', 'WebsiteDataViewApiController@FacilityDataDetails');
        Route::post('/offer/{id}', 'WebsiteDataViewApiController@OfferDetails');
        Route::post('/teacher/{id}', 'WebsiteDataViewApiController@TeacherDetails');
        Route::post('/testimonial/{id}', 'WebsiteDataViewApiController@TestimonialDetails');
        Route::post('/contact/{id}', 'WebsiteDataViewApiController@ContactDetails');
        Route::post('/subscribe/{id}', 'WebsiteDataViewApiController@SubscribeDetails');
        Route::post('/news/{id}', 'WebsiteDataViewApiController@NewsDetails');
        Route::post('/photogallery/{id}', 'WebsiteDataViewApiController@PhotogalleryDetails');
        Route::post('/photocategory/{id}', 'WebsiteDataViewApiController@PhotocategoryDetails');
        Route::post('/socialmedia/{id}', 'WebsiteDataViewApiController@SocialmediaDetails');
        Route::post('/page/{id}', 'WebsiteDataViewApiController@PageDetails');
        Route::post('/faculty/{id}', 'WebsiteDataViewApiController@FacultyDetails');
        Route::post('/config/{id}', 'WebsiteDataViewApiController@WebconfigurationDetails');
        Route::post('/short_course/{id}', 'WebsiteDataViewApiController@ShortCodeDetails');
    });
});

Route::group(['middleware' => ['web'], 'namespace' => 'Tmss\School_website\Http\Controllers'], function () {
    Route::get('/', 'SchoolWebsiteController@index');
    Route::get('about-us', 'SchoolWebsiteController@AboutUs');
    Route::get('teachers', 'SchoolWebsiteController@Teachers');
    Route::get('courses', 'SchoolWebsiteController@Course');

    Route::get('courses/{id}', 'SchoolWebsiteController@Coursedetails');
    Route::get('short_course/{id}', 'SchoolWebsiteController@ShortCoursedetails');

    Route::get('registration', 'SchoolWebsiteController@RegistrationForm');
    Route::post('registration/submit', 'SchoolWebsiteController@RegistrationSubmit');

    Route::get('page/{url}', 'SchoolWebsiteController@Pagedetails');
});