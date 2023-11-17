<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, "index"])->name('index');


// Авторизация
Route::get('/login', [UserController::class, "signin"])->name('signin');
Route::post('/signin_process', [UserController::class, "signin_process"])->name('signin_process');

// Регистрация
Route::get('/registration', [UserController::class, "signup"])->name('signup');
Route::post('/signup_process', [UserController::class, "signup_process"])->name('signup_process');


// Профиль/Выход
Route::get('/account', [UserController::class, "account"])->name('account');
Route::get('/signout', [UserController::class, "signout"])->name('signout');


Route::post("/enroll",[ApplicationController::class, "create_application"])->name('create_application');


Route::get("/admin",[AdminController::class,"index"])->name('admin_panel');
Route::post("/cours",[CourseController::class,"create_course"])->name('cours');
Route::post("/category",[CourseController::class,"create_categories"])->name('category');


Route::get("/application/{id_application}/confirm",[ApplicationController::class,"confirm"])->name('confirm');
