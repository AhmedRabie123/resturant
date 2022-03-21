<?php

use App\Http\Controllers\VisitorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
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
 
//visitor

Route::get('/', [VisitorController::class, 'index'])->name('Vpage');

Auth::routes();

//home

Route::get('/home', [HomeController::class, 'index'])->name('home');

//category

Route::get('/category' , [CategoryController::class , 'show'])->name('cat.show');

Route::post('/category/store' , [CategoryController::class , 'store'])->name('cat.store');

Route::get('/category/{id}' , [CategoryController::class , 'delete'])->name('cat.delete');

Route::post('/category/update' , [CategoryController::class , 'update'])->name('cat.update');


//Meals

Route::get('/create/meal' , [MealController::class , 'create'])->name('meal.create');



