<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::post('filter/show', [MechanicController::class, 'filter'])->name('show-filter');
// Route::get('filter', [MechanicController::class, 'filter'])->name('filter');

///Front route
Route::get('/', [FrontController::class, 'start'])->name('front-start');
Route::get('/index', [FrontController::class, 'index'])->name('front-index')->middleware('roleP:user');
Route::get('/make/{workShop}', [OrderController::class, 'create'])->name('front-create')->middleware('roleP:user');
Route::post('/make/order/{workShop}', [OrderController::class, 'store'])->name('front-store')->middleware('roleP:user');
Route::get('/make/show/{id}', [OrderController::class, 'show'])->name('front-show')->middleware('roleP:user');

//garage routes
Route::get('/garage', [WorkShopController::class, 'index'])->name('garage-index')->middleware('roleP:guest');
Route::get('/garage/create', [WorkShopController::class, 'create'])->name('garage-create')->middleware('roleP:admin');
Route::post('/garage/store', [WorkShopController::class, 'store'])->name('garage-store')->middleware('roleP:admin');
Route::get('/garage/edit/{workShop}', [WorkShopController::class, 'edit'])->name('garage-edit')->middleware('roleP:admin');
Route::put('/garage/upadate/{workShop}', [WorkShopController::class, 'update'])->name('garage-update')->middleware('roleP:admin');
Route::delete('/garage/delete/{workShop}', [WorkShopController::class, 'destroy'])->name('garage-delete')->middleware('roleP:admin');

//facilities routes
Route::get('/facility', [FacilityController::class, 'index'])->name('facility-index')->middleware('roleP:guest');
Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility-create')->middleware('roleP:admin');
Route::post('/facility/store', [FacilityController::class, 'store'])->name('facility-store')->middleware('roleP:admin');
Route::get('/facility/edit/{facility}', [FacilityController::class, 'edit'])->name('facility-edit')->middleware('roleP:admin');
Route::put('/facility/update/{facility}', [FacilityController::class, 'update'])->name('facility-update')->middleware('roleP:admin');
Route::delete('/facility/delete/{facility}', [FacilityController::class, 'destroy'])->name('facility-delete')->middleware('roleP:admin');

//mechanics routes
Route::get('/mechanic', [MechanicController::class, 'index'])->name('mechanic-index')->middleware('roleP:guest');
Route::get('/mechanic/create', [MechanicController::class, 'create'])->name('mechanic-create')->middleware('roleP:admin');
Route::post('/mechanic/store', [MechanicController::class, 'store'])->name('mechanic-store')->middleware('roleP:admin');
Route::get('/mechanic/edit/{mechanic}', [MechanicController::class, 'edit'])->name('mechanic-edit')->middleware('roleP:admin');
Route::put('/mechanic/update/{mechanic}', [MechanicController::class, 'update'])->name('mechanic-update')->middleware('roleP:admin');
Route::delete('/mechanic/delete/{mechanic}', [MechanicController::class, 'destroy'])->name('mechanic-delete')->middleware('roleP:admin');
Route::get('/mechanic/show/{mechanic}', [MechanicController::class, 'show'])->name('mechanic-show')->middleware('roleP:user');
Route::post('/mechanic/rate/{mechanic}', [MechanicController::class, 'rate'])->name('mechanic-rate')->middleware('roleP:user');
//order routes
Route::get('/order', [OrderController::class, 'index'])->name('order-index')->middleware('roleP:user');
Route::get('/order/edit/{order}', [OrderController::class, 'edit'])->name('order-edit')->middleware('roleP:admin');
Route::put('/order/update/{order}', [OrderController::class, 'update'])->name('order-update')->middleware('roleP:admin');
Route::delete('/order/delete/{order}', [OrderController::class, 'destroy'])->name('order-delete')->middleware('roleP:user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
