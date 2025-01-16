<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContainerController;

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


Route::get('/', [ContainerController::class, 'index'])->name('containers.index');
Route::get('/containers/{id}', [ContainerController::class, 'show'])->name('containers.show');
Route::get('/containers/{id}/stop', [ContainerController::class, 'stop'])->name('containers.stop');
Route::get('/containers/{id}/remove', [ContainerController::class, 'remove'])->name('containers.remove');
Route::post('/containers/add', [ContainerController::class, 'add'])->name('containers.add');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::get('images/{reference}/remove', [ImageController::class, 'remove'])->name('images.remove');
Route::post('/images/add', [ImageController::class, 'add'])->name('images.add');
