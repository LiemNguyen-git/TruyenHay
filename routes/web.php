<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\DanhmucTruyen;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexHomeController;
use App\Http\Controllers\TheloaiController;


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
Route::get('/', [IndexHomeController::class, 'home'])->middleware('cacheResponse:600');
Route::get('/danh-muc/{slug}', [IndexHomeController::class, 'danhmuc'])->middleware('cacheResponse:600');
Route::get('/xem-truyen/{slug}', [IndexHomeController::class, 'xemtruyen'])->middleware('cacheResponse:600');
Route::get('/xem-chapter/{slug}', [IndexHomeController::class, 'xemchapter'])->middleware('cacheResponse:600');
Route::get('/the-loai/{slug}', [IndexHomeController::class,'theloai'])->middleware('cacheResponse:600');
Route::get('/tim-kiem', [IndexHomeController::class,'timkiem'])->middleware('cacheResponse:600');

Route::get('/timkiem-ajax', [IndexHomeController::class,'timkiem_ajax'])->middleware('cacheResponse:600');
Route::post('/truyennoibat', [IndexHomeController::class,'truyennoibat'])->middleware('cacheResponse:600');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhmucTruyen::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);



