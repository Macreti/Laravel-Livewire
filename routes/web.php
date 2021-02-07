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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('contacts','admin.contacts')->name('contacts');
Route::view('register-form', 'admin.register')->name('register-form');
Route::view('trix-editor', 'admin.trix')->name('trix-editor');
Route::view('admin-bower', 'bower.admin_template');
