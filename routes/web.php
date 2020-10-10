<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ReservationController;
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
Route::get('/', function () {
    return view('atlantis.index');
});
Route::get('/index', function () {
    return view('atlantis.index');
})->name('index');
Route::get('/reservation', 'ReservationController@index')->name('reservation');
Route::post('/complete', 'ReservationController@complete')->name('complete');

Route::get('/contact', 'ContactsController@contact')->name('contact');
Route::post('/contact', 'ContactsController@back')->name('contact');
Route::post('/confirm', 'ContactsController@confirm')->name('confirm');
Route::post('/process', 'ContactsController@process')->name('process');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/delete', 'HomeController@delete')->name('delete');

Route::get('/setting/password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
Route::post('/setting/password', 'Auth\ChangePasswordController@ChangePassword')->name('password.change');
Route::get('/setting/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
Route::post('/setting/deacrive', 'Auth\DeactiveController@deactive')->name('deactive');
Route::get('/setting', 'SettingController@index')->name('setting');
Route::get('/setting/name', 'SettingController@showChangeNameForm')->name('name.form');
Route::post('/setting/name', 'SettingController@changeName')->name('name.change');
Route::get('/setting/email', 'SettingController@showChangeEmailForm')->name('email.form');
Route::post('/setting/email', 'SettingController@changeEmail')->name('email.change');
Route::get('/setting/username', 'SettingController@showChangeUsernameForm')->name('username.form');
Route::post('/setting/username', 'SettingController@changeUsername')->name('username.change');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('index', 'HomeController@index')->name('index');
    Route::get('all_reservation', 'HomeController@all_reservation')->name('all_reservation');
    Route::post('index', 'HomeController@acceptance')->name('acceptance');
    Route::get('user_search', 'HomeController@user_search')->name('user_search');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/setting/password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    Route::post('/setting/password', 'Auth\ChangePasswordController@changePassword')->name('password.change');
    Auth::routes([
        'register' => false,
        'reset'    => true,
        'verify'   => false
    ]);
});