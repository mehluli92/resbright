<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\EmploymentController;
// use App\Http\Controllers\RbFileController;
// use App\Http\Controllers\DestinationController;
// use App\Http\Controllers\PriceController;
// use App\Http\Controllers\PaymentsController;
// use App\Http\Controllers\SatusController;
// use App\Http\Controllers\MailController;



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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', 'HomeController@admin')->name('dashboard')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::Resource('roles', 'RoleController')->middleware('auth');
//user management
Route::Resource('users', 'UserController')->middleware('auth');
Route::get('search-users', 'UserController@search')->name('users.search')->middleware('auth'); 

//contact details
Route::Resource('contacts', 'ContactController')->middleware('auth');

//Employment Details 
Route::resource('employments', EmploymentController::class)->middleware('auth');

//RB Files
Route::resource('rbfiles', RbFileController::class)->middleware('auth');
Route::get('/all-rbfiles', 'RbFileController@showAll')->name('rbfiles.all');
Route::put('/status-rbfiles/{rbfile}', 'RbFileController@status')->name('rbfiles.status');
Route::get('search-rbfiles', 'UserController@search')->name('rbfiles.search')->middleware('auth'); 
Route::get('/download/{name}', 'HomeController@getDownload')->name('rbfiles.download')->middleware('auth'); 



//Destination
Route::resource('destinations', DestinationController::class)->middleware('auth');

//Prices
Route::resource('prices', PriceController::class)->middleware('auth');


//Payments
Route::resource('payments', PaymentsController::class)->middleware('auth'); 

//Status updates
Route::put('/update-status/{rb_id}', 'SatusController@updateStatus')->name('status.update');

//send email functions 
Route::get('/send-email', 'MailController@index')->name('email.test');
Route::get('/reg-acknowledge-email', 'MailController@registration')->name('email.registration');
//send texts functions
Route::get('/send-text', 'MailController@test')->name('text.test');

//test emails
Route::get('/emails', function () {
    return view('emails.quotation');
})->name('email');
