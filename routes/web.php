<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/' , [HomeController::class , 'index'])->name('home.index');
Route::get('home' , [HomeController::class , 'redirect'])->name('home.redirect')->middleware('auth' , 'verified');

Route::middleware(['auth:sanctum' , config('jetstream.auth_session') , 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin CRUD Application ('for doctor')
Route::get('add_doctor' , [AdminController::class , 'add_doctor'])->name('admin.add_doctor');
Route::post('add_doctor' , [AdminController::class , 'add_doctor_data'])->name('admin.add_doctor_data');
Route::get('all_doctor' , [AdminController::class , 'all_doctor'])->name('admin.all_doctor');
Route::get('edit_doctor/{id}' , [AdminController::class , 'edit_doctor'])->name('admin.edit_doctor');
Route::put('update_doctor/{id}', [AdminController::class, 'update_doctor'])->name('admin.update_doctor');
Route::delete('delete_doctor/{id}', [AdminController::class, 'destroy_doctor'])->name('admin.destroy_doctor');
Route::get('trach_doctor' , [AdminController::class , 'trach_doctor'])->name('admin.trach_doctor');
Route::get('forcedelete_doctor/{id}' , [AdminController::class , 'forcedelete_doctor'])->name('admin.forcedelete_doctor');
Route::get('restore_doctor/{id}' , [AdminController::class , 'restore_doctor'])->name('admin.restore_doctor');


// Admin CRUD Application ('for news')
Route::get('add_news' , [AdminController::class , 'add_news'])->name('admin.add_news');
Route::post('add_news' , [AdminController::class , 'add_news_data'])->name('admin.add_news_data');
Route::get('all_new' , [AdminController::class , 'all_news'])->name('admin.all_news');
Route::get('edit_news/{id}' , [AdminController::class , 'edit_news'])->name('admin.edit_news');
Route::put('update_news/{id}', [AdminController::class, 'update_news'])->name('admin.update_news');
Route::delete('delete_news/{id}', [AdminController::class, 'destroy_news'])->name('admin.destroy_news');
Route::get('trach_news' , [AdminController::class , 'trach_news'])->name('admin.trach_news');
Route::get('forcedelete_news/{id}' , [AdminController::class , 'forcedelete_news'])->name('admin.forcedelete_news');
Route::get('restore_news/{id}' , [AdminController::class , 'restore_news'])->name('admin.restore_news');


Route::get('all_appointments' , [AdminController::class , 'all_appointments'])->name('admin.all_appointments');
Route::get('approved/{id}' , [AdminController::class , 'approved'])->name('admin.approved');
Route::get('canceled/{id}' , [AdminController::class , 'canceled'])->name('admin.canceled');
Route::get('send_email/{id}' , [AdminController::class , 'send_email'])->name('admin.send_email');
Route::post('send_email/{id}' , [AdminController::class , 'send_email_data'])->name('admin.send_email_data');








Route::get('news/{id}' , [HomeController::class , 'news'])->name('home.news');
Route::get('all_news' , [HomeController::class , 'all_news'])->name('home.all_news');


Route::post('appointment' , [HomeController::class , 'appointment_data'])->name('user.appointment_data');
Route::get('my_appointment/{id}' , [HomeController::class , 'my_appointment'])->name('user.my_appointment');
Route::get('edit_appointment/{id}' , [HomeController::class , 'edit_appointment'])->name('user.edit_appointment');
Route::put('update_appointment/{id}', [HomeController::class, 'update_appointment'])->name('user.update_appointment');
Route::get('forcedelete_appointment/{id}' , [HomeController::class , 'forcedelete_appointment'])->name('user.forcedelete_appointment');
