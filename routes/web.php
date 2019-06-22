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





Route::get('/', 'HomeController@index');
Route::get('/home', 'AdminController@dash');


	Route::prefix('MASTERKEY_ADMIN')->group(function () {
	
});

	Route::any('/fff',function(){
		$event = App\Event::where('id',15)->get()->first();
			return new App\Mail\EventCreated($event); 	
		});



Route::auth();




Route::prefix('admin')->group(function () {


	Route::middleware(['admin'])->group(function () {
        
		
		Route::any('/dashboard','AdminController@dash');



		Route::resource('doctors', 'DoctorController');
		Route::resource('sponsors', 'SponsorController');
		Route::resource('abouts', 'AboutController');
		Route::resource('courses', 'CourseController', ['except' => [
		    'show'
		]]);
		Route::resource('events', 'EventController', ['except' => [
		    'show'
		]]);

		
		Route::get('events/attendees/{id}', 'EventController@attendees');
		Route::post('events/search', 'EventController@search');
		Route::get('events/images/{id}', 'EventController@images');





		Route::resource('attendees', 'EventAttendeesController',['except' => [
		    'create','show','edit','update','destroy'
		]]);
		
		Route::resource('/freeVideos', 'DemoController',['except' => [
		    'show','edit','update',
		]]);


		Route::get('attendees/{id}/confirm', 'EventAttendeesController@confirm');
		Route::get('attendees/{id}/unconfirm', 'EventAttendeesController@unconfirm');



		Route::resource('contacts', 'ContactController', ['only' => [
		    'index', 'destroy'
		]]);
		Route::resource('testimonials', 'TestimonialController', ['except' => [
		    'show'
		]]);
		Route::resource('eventImages', 'EventImagesController',['except' => [
		    'show','edit','update',
		]]);
		Route::delete('attendees/{eventAttendee_id}', 'EventAttendeesController@destroy');

		Route::resource('/admins', 'AdminController',['except' => [
		    'show','edit','update',
		]]);
		Route::resource('/demos', 'DemoController',['except' => [
		    'show','edit','update',
		]]);
		Route::get('/home', 'HomeController@index')->name('home');
		
		Route::resource('/subscribes', 'SubscribeController', ['only' => [
		    'index', 'destroy'
		]]);

		Route::get('/subscribes/{id}/notify', 'SubscribeController@notify');
		Route::get('/subscribes/{id}/ignore', 'SubscribeController@ignore');
		
		Route::resource('/configs', 'ConfigController');
		Route::resource('/fq', 'FQController', ['except' => ['show']]);
		Route::get('/all/users','UserController@allUsers');
		Route::resource('users','UserController');
		Route::get('users/active/{user}','UserController@activeUser');
		Route::get('users/deactivate/{user}','UserController@deactivateUser');
		Route::get('admins/active/{user}','AdminController@activeAdmin');
		Route::get('admins/deactivate/{user}','AdminController@deactivateAdmin');
		Route::post('users/send/mail/{active}','AdminController@sendMessageToAll');

		Route::resource('/team', 'TeamController', ['except' => ['show']]);

		Route::get('/users/{id}/notify', 'UserController@notify');
		Route::get('/users/{id}/ignore', 'UserController@ignore');
    });


});

//Route::post('events/apply', 'EventAttendeesController@store');
Route::get('events/apply/{event_id}', 'EventAttendeesController@store');
Route::get('about', 'AboutController@show');
Route::get('events/gallery', 'EventImagesController@index');
Route::get('courses/{id}', 'CourseController@show');
Route::get('events/{id}', 'EventController@show');
Route::get('attendees/confirmed', 'EventAttendeesController@getConfirmed');
Route::get('attendees/unconfirmed', 'EventAttendeesController@getUnconfirmed');
Route::get('/contact/', 'ContactController@create');
Route::post('/contact/', 'ContactController@store');
Route::post('/courses/{course_id}', 'CourseController@show');
Route::post('/events/{event_id}', 'EventController@show');
Route::get('/free/videos', 'DemoController@getVideos');
Route::post('/search', 'HomeController@search')->name('search');
Route::post('/subscribes/', 'SubscribeController@store');
Route::get('/fq','FQController@getAllFQs');

//Route::post('/reset/password/check','Auth\ForgotPasswordController@resetPasswordChecker')->name('resetPasswordChecker');



/**
* Routes Here To The End User
* Note That Some Routes Will Extend From The Above Routes
* Like All "Select All"
**/