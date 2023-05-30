<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\Tareacontroller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Mail\VerifyEmail;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-google', [UserController::class ,'viewGoolge']);
Route::get('/google-callback', [UserController::class ,'viewGoogleCallback']);

Route::post('/logout', [UserController::class,'userLogout'])->name('logout');
Route::get('/register' , [UserController::class , 'viewRegister'])->name('viewRegister');
Route::post('/register' , [UserController::class , 'userRegister'])->name('userRegister');

Route::get('/login' , [UserController::class , 'viewLogin'])->name('viewLogin');
Route::post('/login' , [UserController::class , 'userLogin'])->name('userLogin');

Route::get('/home' , [UserController::class , 'viewHome'])->middleware(['login'])->name('viewHome');
Route::get('/home/tareas' , [VistaController::class , 'viewHeader'])->middleware(['login'])->name('viewHeader');
Route::get('/home/users' , [UserController::class , 'viewUser'])->middleware(['login'])->name('viewUser');
Route::get('/home/users/delete' , [UserController::class , 'deleteUser'])->middleware(['login'])->name('deleteUser');
Route::get('/home/users/edit' , [UserController::class , 'editUser'])->middleware(['login'])->name('editUser');
Route::post('/home/users/edit' , [UserController::class , 'updateUser'])->middleware(['login'])->name('updateUser');


// Route::get('/home/body' , [VistaController::class , 'viewBody'])->middleware(['login'])->name('viewBody');

Route::get('/verify', [VerifyEmail::class , 'build'])->middleware('login')->name('verification.verify');
Route::post('/home/add-tarea', [Tareacontroller::class , 'addTarea'])->middleware('login')->name('addTarea');
Route::post('/home/delete-tarea', [Tareacontroller::class , 'deleteTarea'])->middleware('login')->name('deleteTarea');


