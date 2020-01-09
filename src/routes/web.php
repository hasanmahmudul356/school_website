<?php
Route::group(['namespace' => 'Tmss\School_website\Http\Controllers'], function () {
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
});

Route::group(['namespace' => 'Tmss\School_website\Http\Controllers'], function () {
    Route::get('/', 'SchoolWebsiteController@index');
});