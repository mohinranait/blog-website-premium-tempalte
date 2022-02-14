<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\pageController;
use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\userController;
use App\Http\Controllers\Backend\postController;

// Use Frontend Controller 
use App\Http\Controllers\Frontend\frontPageController;

// Frontend Routes
Route::get('/' , [frontPageController::class , 'home']);
Route::get('details-post/{slug}' , [frontPageController::class , 'detailsPost'])->name('detailspost');





// Admin Route Groupe
Route::group( ['prefix' => 'admin'],function(){
    Route::get('/dashboard',[pageController::class, 'index'])->name('admin.dashboard')->middleware('auth','role');
    // Blog post Route Groupe 
    Route::group(['prefix' => '/post'],function(){
        Route::get('/all-post', [postController::class , 'index'])->name('post.index')->middleware('auth','role');
        Route::get('/create', [postController::class , 'create'])->name('post.create')->middleware('auth','role');
        Route::post('/store', [postController::class , 'store'])->name('post-store')->middleware('auth','role');
        Route::get('/edit/{id}', [postController::class , 'edit'])->name('post.edit')->middleware('auth','role');
        Route::post('/update/{id}', [postController::class , 'update'])->name('post.update')->middleware('auth','role');
        Route::post('/destroy/{id}', [postController::class , 'destroy'])->name('post.destroy')->middleware('auth','role');
    });
    // Category Route Groupe 
    Route::group(['prefix' => '/category'],function(){
        Route::get('/all-category', [categoryController::class , 'index'])->name('category.index')->middleware('auth','role');
        Route::get('/change/{status}', [categoryController::class , 'status'])->name('category.status')->middleware('auth','role');
        Route::get('/create', [categoryController::class , 'create'])->name('category.create')->middleware('auth','role');
        Route::post('/store', [categoryController::class , 'store'])->name('category.store')->middleware('auth','role');
        Route::get('/edit/{id}', [categoryController::class , 'edit'])->name('category.edit')->middleware('auth','role');
        Route::post('/update/{id}', [categoryController::class , 'update'])->name('category.update')->middleware('auth','role');
        Route::post('/destroy/{id}', [categoryController::class , 'destroy'])->name('category.destroy')->middleware('auth','role');
    });
    // User Route Groupe 
    Route::group(['prefix' => '/user'],function(){
        Route::get('/all-user', [userController::class , 'index'])->name('user.index')->middleware('auth','role');
        Route::get('/create', [userController::class , 'create'])->name('user.create')->middleware('auth','role');
        Route::post('/store', [userController::class , 'store'])->name('user.store')->middleware('auth','role');
        Route::get('/edit/{id}', [userController::class , 'edit'])->name('user.edit')->middleware('auth','role');
        Route::post('/update/{id}', [userController::class , 'update'])->name('user.update')->middleware('auth','role');
        Route::post('/destroy/{id}', [userController::class , 'destroy'])->name('user.destroy')->middleware('auth','role');
    });
});



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
