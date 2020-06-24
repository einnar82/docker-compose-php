<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/about', function () {
    $data = 'John Doe';
    return view('about', ['name' => $data]);
})->name('about');

// /home/me
// /home/you
// /home/you/and/me/against/the/world

Route::group(['prefix' => 'home'], function () {
    Route::get('/me', function () {
        return redirect('/');
        // return 'me';
    });

    Route::get('/you', function () {
        return redirect()->route('about');
        // return 'you';
    });
});
