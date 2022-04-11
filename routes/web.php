<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarController;

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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/clients', function () {
    return view('dashboard');
})->name('clients');

Route::get('/pages', function () {
    return view('dashboard');
})->name('pages');


Route::get('calender',[FullCalendarController::class,'index'])->name('calender.index');
Route::get('calender/full-calender', [FullCalendarController::class, 'index']);
Route::post('full-calender/action', [FullCalendarController::class, 'action']);



Route::get('users','App\Http\Controllers\UserProfileController@index' )->name('users.index');
Route::get('users/add','App\Http\Controllers\UserProfileController@add');
Route::get('users/{user}/delete','App\Http\Controllers\UserProfileController@delete')->name('users.delete');
Route::get('users/{id}/edit','App\Http\Controllers\UserProfileController@edit')->name('users.edit');
Route::post('users/{user}/edit/update-profile','App\Http\Controllers\UserProfileController@updateProfile')->name('users.updateProfile');
Route::post('users/{user}/edit/update-email','App\Http\Controllers\UserProfileController@updateEmail')->name('users.updateEmail');
Route::post('users/{user}/edit/update-password','App\Http\Controllers\UserProfileController@updatePassword')->name('users.updatePassword');
Route::post('users/add/create','App\Http\Controllers\UserProfileController@create')->name('users.add');


Route::get('/changepassword','App\Http\Controllers\UserProfileController@passwordForm')->name('changepassword');
Route::post('/changepassword','App\Http\Controllers\UserProfileController@changePassword');



Route::get('pages','App\Http\Controllers\PagesController@index' )->name('pages.index');
Route::get('pages/add','App\Http\Controllers\PagesController@add');
Route::get('pages/{page}','App\Http\Controllers\PagesController@show')->name('pages.show');
Route::get('pages/{id}/edit','App\Http\Controllers\PagesController@edit')->name('pages.edit');
Route::get('pages/{page}/delete','App\Http\Controllers\PagesController@delete')->name('pages.delete');
Route::post('pages/{page}/edit/update','App\Http\Controllers\PagesController@update')->name('pages.update');
Route::post('pages/add/create','App\Http\Controllers\PagesController@create')->name('pages.add');




Route::get('clients','App\Http\Controllers\ClientsController@index')->name('clients.index');
Route::get('clients/add','\App\Http\Controllers\ClientsController@add');
Route::get('clients/{id}/edit','\App\Http\Controllers\ClientsController@edit')->name('clients.edit');
Route::get('clients/{client}/delete','App\Http\Controllers\ClientsController@delete')->name('clients.delete');
Route::get('clients/{client}/show','\App\Http\Controllers\ClientsController@show')->name("clients.show");
Route::post('clients/{client}/edit/update','\App\Http\Controllers\ClientsController@update')->name('clients.update');
Route::post('clients/add/create','\App\Http\Controllers\ClientsController@create')->name('clients.add');






require __DIR__.'/auth.php';
