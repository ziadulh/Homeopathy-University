<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/','HomeController@index')->name('home');
Route::get('/about-us','homeopathyPagesController@view')->name('page.aboutus');
Route::get('/contact-us','homeopathyPagesController@view')->name('page.contactus');
Route::get('/photo-gallery','homeopathyPagesController@gallery')->name('page.gallery');
Route::get('/photo-gallery/{id}','homeopathyPagesController@photo');
Route::get('/register','HomeController@register')->name('home.register');
Route::post('/register-process','HomeController@registerprocess')->name('home.registerprocess');

Route::get('/send-mail-pdf/{id}','HomeController@sendPdfMail')->name('send.pdf');


Route::get('/admin', 'userRegistrationController@admin')->name('admin');
Route::resource('/registration','userRegistrationController');
Route::GET('/registration/{id}/delete','userRegistrationController@destroy')->name('deleteuser');

Route::POST('/registration-search','userRegistrationController@index')->name('registration.search');



Route::resource('/pages','homeopathyPagesController');
Route::resource('/message','messageController');
Route::resource('/slider','sliderController');
Route::resource('/album','albumController');
Route::resource('/photo','PhotoController');
Route::resource('/setting','settingController');
Route::resource('/notice','noticeController');

Route::resource('/adminCURD','adminRegistrationController');

Route::get('findState/','dependentAjaxController@findState')->name('findState');
Route::get('/findDistrict/','dependentAjaxController@findDistrict')->name('findDistrict');

Route::get('pdfview/{id}',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));


// remove photo from photo preview all ajax call functin
Route::get('userPhotoDelete/', 'dependentAjaxController@userPhotoDestroy')->name('user.photo');
Route::get('userSignDestroy/', 'dependentAjaxController@userSignDestroy')->name('user.sign');
Route::get('albumPhotoDelete/', 'dependentAjaxController@albumPhotoDestroy')->name('album.photo');


Route::get('settingDelete/', 'dependentAjaxController@settingDelete')->name('settingDelete');
Route::get('sliderDelete/', 'dependentAjaxController@sliderDelete')->name('sliderDelete');

Route::get('messageDelete/', 'dependentAjaxController@messageDelete')->name('messageDelete');

Route::get('pageDelete/', 'dependentAjaxController@pageDelete')->name('pageDelete');





Route::get('photodelete/', 'dependentAjaxController@photoDestroy')->name('noticephoto.destroy');


// Route::get('htmlpdf','HomeController@htmlpdf')->name('html.pdf');


// Route::get('htmlpdf/1','HomeController@generatePDF58')->name('html.pdf');

// Route::get('pdfview',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));


