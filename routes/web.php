<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SelectableController;
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


// Route::get('/', [ShopController::class, 'index']);
Route::get('/live', [ShopController::class, 'live']);
Route::get('/block', [ShopController::class, 'block']);
Route::get('/dashboard', [ShopController::class, 'index']);
Route::get('/addshop', [ShopController::class, 'add']);
Route::get('/viewshop/{id}', [ShopController::class, 'view']);
Route::post('/addshopss', [ShopController::class, 'save']);
Route::get('/deleteshop/{id}', [ShopController::class, 'delete']);
Route::get('/editshop/{id}', [ShopController::class, 'edit']);
Route::post('/updateshop/{id}', [ShopController::class, 'update']);
Route::get('/downloadshop/{id}', [ShopController::class, 'downloadSh']);


Route::get('/', [SelectableController::class, 'index']);
Route::any('date', [SelectableController::class, 'date']);

Route::get('pdf', [SelectableController::class, 'showpdf']);
Route::get('/downloadpdf/{id}', [SelectableController::class, 'downloadPDF']);


Route::get('/menu', function () {
    return view('menu_bar.tittle');
});
Route::get('/home', function () {
    return view('menu_bar.home');
});
Route::get('/getOptions', [SelectableController::class, 'getData']);

   //  dark_mode

Route::get('/dark', function () {
    return view('dark');
});
Route::any('/switch_modes', [SelectableController::class, 'switchModes'])->name('switch.modes');


Route::get('/data', function () {
    return view('dataTable');
});