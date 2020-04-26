<?php

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

// Route::get('/', function () {
//     return view('main', ['pagetitle'=> 'Dashboard']);
// })->name('main');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('change.password');
Route::post('/change-password', 'Auth\ChangePasswordController@updatepassword')->name('update.password');

Route::middleware('verified')->group(function () {
    // Put protected routes here
    Route::group(['prefix' => 'admin'], function () {
        Route::get('', function () {
            return view('admin.index', ['pagetitle'=> 'Admin Dashboard']);
        })->name('admin.index');
    });
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('', function () {
        return view('blog.index');
    })->name('blog.index');

    Route::get('create', function () {
        return view('blog.create');
    })->name('blog.create');
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

// Route::get('/forgot-password', function () {
//     return view('forgot-password');
// })->name('forgot-password');

Route::get('/about', function () {
    return view('about', ['pagetitle'=> 'About Us']);
})->name('about');

Route::get('/contact', function () {
    return view('contact', ['pagetitle'=> 'Contact Us']);
})->name('contact');

Route::resource('questions', 'QuestionsController')->except('show');
Route::get('questions/{slug}', 'QuestionsController@show')->name('questions.show');
