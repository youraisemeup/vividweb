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

Route::get('/',"HomeController@index");

Route::get('/home',"HomeController@home");

//Route::get('/metric-calculation',"HomeController@metricCalc");

Route::match(['GET','POST'],'/metric-calculation',"HomeController@metricCalc");
Route::match(['GET','POST'],'/metric-calculation-tab',"HomeController@metricCalcTabbed");
Route::match(['GET','POST'],'/failed-valve',"HomeController@secondScreen");
Route::match(['GET','POST'],'/failed-valve-tab',"HomeController@secondScreenTabbed");
Route::match(['GET','POST'],'/failed-valve-result',"HomeController@secondResultScreen")->name('failed-valve-result');
Route::match(['GET','POST'],'/transcatheter-valve',"HomeController@thirdScreen");

Route::get('/metric-error',"HomeController@metricError");
Route::post('/matric-result',"HomeController@metricSuccess");
Route::get('/imperial-error',"HomeController@imperialError");

Route::get('/f-valve-info',"HomeController@failvalveInfo");
Route::post('/f-valve-calc',"HomeController@failvalveResult");

Route::get('/t-valve-info',"HomeController@transcathrtrvalveinfo");

Route::post('/t-valve-result',"HomeController@transcathrtrvalveresult");

Route::get('/contact-us',"HomeController@contact");

Route::post('/postFormdata',"HomeController@postFormdata");
/*Route::get('/about-us',"HomeController@about");
Route::get('/privacy-policy',"HomeController@privacypolicy");
Route::get('/terms-of-use',"HomeController@termsUse");*/
Route::get('/lableSize',"HomeController@lableSize");
Route::get('/getAtmpressure',"HomeController@getAtmpressure");

Route::group(['prefix'=>'/Api'], function(){
	Route::post('/user-subscribe',"UserController@usersubscribe");
	Route::get('/get-data',"UserController@getdata");
	Route::post('/verify-otp',"UserController@verifyOtpcode");
	Route::post('/resend-otp',"UserController@resendOtpcode");
	Route::post('/insert-data',"UserController@insert_data");
	//Route::post('/mailchimp',"UserController@mailchimp");

}); 

Route::get('/index',"AdminController@index");

Route::get('/get-data',"AdminController@getUserdata");

Route::post('/admin-login','AdminController@adminlogin');

Route::get('/admin-logout','AdminController@adminlogout');

Route::get('/search-data','AdminController@searchdata');

Route::get('/delete-data', 'AdminController@deletedata');


	//,"AdminController@deletedata");

Route::get('/graph-data','AdminController@graphdata');

Route::get('/search-graph','AdminController@searchgraphdata');

Route::get('/export-data','AdminController@exportuserdata');

Route::get('/get-valve-data','AdminController@getValvedata');

Route::get('/get-lablesize-data','AdminController@getLablesizedata');

Route::get('/get-mechanism-data','AdminController@getfmechanismdata');

Route::get('/get-thv-data','AdminController@getthvdata');

Route::get('/serach-graph-data',"AdminController@searchgdata");

