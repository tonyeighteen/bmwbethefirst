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

Route::get("/",[\App\Http\Controllers\HomeController::class,"Index"])->name("home");
Route::get("/index.html",[\App\Http\Controllers\HomeController::class,"Index"])->name("home");;
Route::post("/request.html",[\App\Http\Controllers\HomeController::class,"RequestLetter"])->name("request");;
Route::get("/model/{slug}.html",[\App\Http\Controllers\ProductController::class,"Index"])->name("product");
Route::middleware(['check.login'])->group(function () {
    Route::get("/dashboard",[\App\Http\Controllers\AdminController::class,"Index"])->name("admin");
    Route::get("/dashboard/home",[\App\Http\Controllers\AdminController::class,"Home"])->name("admin.home");
    Route::get("/dashboard/model",[\App\Http\Controllers\AdminController::class,"Model"])->name("admin.model");
    Route::get("/dashboard/account",[\App\Http\Controllers\AdminController::class,"Account"])->name("admin.account");
    Route::get("/dashboard/blog",[\App\Http\Controllers\AdminController::class,"Blog"])->name("admin.blog");
    Route::get("/dashboard/request",[\App\Http\Controllers\AdminController::class,"Request"])->name("admin.request");
    Route::post("/dashboard/request/list",[\App\Http\Controllers\AdminController::class,"GetRequest"])->name("admin.request.list");
    Route::post("/dashboard/model/list",[\App\Http\Controllers\AdminController::class,"GetProduct"])->name("admin.model.list");
    Route::post("/dashboard/model/add",[\App\Http\Controllers\AdminController::class,"AddOrUpdateProduct"])->name("admin.model.add");
    Route::post("/dashboard/blog/list",[\App\Http\Controllers\AdminController::class,"GetBlog"])->name("admin.blog.list");
    Route::post("/dashboard/blog/add",[\App\Http\Controllers\AdminController::class,"AddOrUpdateBlog"])->name("admin.blog.add");
    Route::post("/dashboard/model/delete",[\App\Http\Controllers\AdminController::class,"DeleteProduct"])->name("admin.model.delete");
    Route::post("/dashboard/blog/delete",[\App\Http\Controllers\AdminController::class,"DeleteBlog"])->name("admin.blog.delete");
    Route::post("/dashboard/upload",[\App\Http\Controllers\AdminController::class,"UploadImage"])->name("admin.upload");
    Route::get("/dashboard/login",[\App\Http\Controllers\AdminController::class,"Login"])->name("login");
    Route::post("/dashboard/account/change",[\App\Http\Controllers\AdminController::class,"ChangePassword"])->name("admin.change_password");
    Route::get("/dashboard/logout",[\App\Http\Controllers\AdminController::class,"Logout"])->name("logout");
    Route::post("/dashboard/login",[\App\Http\Controllers\AdminController::class,"Login"])->name("login");
});

