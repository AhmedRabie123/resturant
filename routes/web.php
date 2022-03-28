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
 
//visitor route
 
Route::get('/', [VisitorController::class, 'index'])->name('Vpage');

Auth::routes();

//home route

Route::get('/home', [HomeController::class, 'index'])->name('home');

//category route

Route::get('/category' , [CategoryController::class , 'show'])->name('cat.show');

Route::post('/category/store' , [CategoryController::class , 'store'])->name('cat.store');

Route::get('/category/{id}' , [CategoryController::class , 'delete'])->name('cat.delete');

Route::post('/category/update' , [CategoryController::class , 'update'])->name('cat.update');


//Meals route

Route::get('/meal/show' , [MealController::class , 'index'])->name('meal.index');

Route::get('/create/meal' , [MealController::class , 'create'])->name('meal.create');

Route::post('meal/store' , [MealController::class , 'store'])->name('meal.store');

Route::get('/meal/edit/{id}' , [MealController::class , 'edit'])->name('meal.edit');

Route::post('/meal/update/{id}' , [MealController::class , 'update'])->name('meal.update');

Route::get('/meal/{id}' , [MealController::class , 'delete'])->name('meal.delete');

Route::get('/meal/show/{id}' , [MealController::class , 'show_details'])->name('meal_details');

//orders route

Route::post('order/store' , [HomeController::class , 'orderStore'])->name('order.store');




