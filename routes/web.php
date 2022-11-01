<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');
Route::get('user-sign-in',function (){
    return view('auth.login');
});
Route::get('user-logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');

})->name('user.logout');
Route :: get('my-account','PagesController@myProfile')->name('my-account')->middleware('auth');
Route :: prefix('hostel')->group(function(){
    Route :: get('/','MeesController@index')->name('mees.index');
    Route :: post('store','MeesController@store')->name('mees.store');
    Route :: get('view/{mees_id}','MeesController@view')->name('mees.view');
    Route :: get('edit/{hostel_id}','MeesController@edit')->name('hostel.edit');
    Route :: post('update/{hostel_id}','MeesController@update')->name('hostel.update');
});

Route :: post('location/store','LocationController@store')->name('admin.location.store');

Route::get('/home', 'PagesController@index')->name('home');

Route::get('/about', 'PagesController@about');


Route::get('/nearby-me', 'PagesController@nearbyMe');

Route::get('/profile', 'PagesController@profile');

Route::get('/register/option', 'PagesController@registerOption')->name('register.option');


Auth::routes();

Route::get('admin', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


