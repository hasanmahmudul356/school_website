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


    Route::group(['prefix'=>'faculty'], function (){
        Route::get('/list', 'SchoolWebsiteAdminController@FacultyList');
        Route::get('/add', 'SchoolWebsiteAdminController@FacultyAddForm');
        Route::post('/add', 'SchoolWebsiteAdminController@FacultyStore');
        Route::post('/update', 'SchoolWebsiteAdminController@FacultyUpdateStore');
        Route::get('/edit/{id}', 'SchoolWebsiteAdminController@FacultyEdit');
        Route::get('/is_homepage/{id}', 'SchoolWebsiteAdminController@FacultyHomeFaculty');
        Route::get('/delete/{id}', 'SchoolWebsiteAdminController@FacultyDelete');
    });


});

Route::group(['middleware' => ['web'], 'namespace' => 'Tmss\School_website\Http\Controllers'], function () {
    Route::get('/', 'SchoolWebsiteController@index');
    Route::get('about-us', 'SchoolWebsiteController@AboutUs');
    Route::get('teachers', 'SchoolWebsiteController@Teachers');
    Route::get('courses', 'SchoolWebsiteController@Course');

    Route::get('courses/{id}', 'SchoolWebsiteController@Coursedetails');

    Route::get('registration', 'SchoolWebsiteController@RegistrationForm');
    Route::post('registration/submit', 'SchoolWebsiteController@RegistrationSubmit');

    Route::get('page/{url}', 'SchoolWebsiteController@Pagedetails');
});