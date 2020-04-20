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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'blog'], function () {
    Route::get('', function () {
        return view('blog.index');
    })->name('blog.index');

    Route::get('create', function () {
        return view('blog.create');
    })->name('blog.create');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('', function () {
        return view('admin.index', ['pagetitle'=> 'Admin Dashboard']);
    })->name('admin.index');
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


