<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [Admin::class, 'index']);

Route::get('/admin/exam_category', [Admin::class, 'exam_category']);
Route::post('/admin/add_category', [Admin::class, 'add_category']);
Route::post('/admin/edit_category/{id}', [Admin::class, 'edit_category']);
Route::delete('/admin/delete_category/{id}', [Admin::class, 'delete_category']);

Route::get('/admin/manage_exam', [Admin::class, 'manage_exam']);
Route::post('/admin/add_manage_exam', [Admin::class, 'add_manage_exam']);
Route::delete('/admin/delete_exam/{id}', [Admin::class, 'delete_exam']);
Route::post('/admin/edit_exam/{id}', [Admin::class, 'edit_exam']);


Route::get('/admin/manage_student', [Admin::class, 'manage_student']);
Route::post('/admin/add_manage_student', [Admin::class, 'add_manage_student']);
Route::post('/admin/edit_manage_student/{id}', [Admin::class, 'edit_manage_student']);
Route::delete('/admin/delete_student/{id}', [Admin::class, 'delete_student']);


Route::get('/admin/manage_portal', [Admin::class, 'manage_portal']);
Route::post('/admin/add_manage_portal', [Admin::class, 'add_manage_portal']);
Route::post('/admin/edit_manage_portal/{id}', [Admin::class, 'edit_manage_portal']);
Route::delete('/admin/delete_portal/{id}', [Admin::class, 'delete_portal']);


