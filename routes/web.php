<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomepageController;
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

Route::get('/', function () {
    return redirect('homepage');
    return view('welcome');
});
Route::get('homepage',[HomepageController::class,'homepage']);
Route::get('blog-details/{id}',[HomepageController::class,'details']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('add-post',[PostController::class,'save']);
Route::get('list-posts',[PostController::class,'list']);
Route::get('edit-post/{id}',[PostController::class,'edit']);
Route::post('update-post',[PostController::class,'update']);
Route::get('delete-post/{id}',[PostController::class,'delete']);
Route::get('deactivate-post/{id}',[PostController::class,'deactivate']);
Route::get('activate-post/{id}',[PostController::class,'activate']);
Route::get('deleted-posts',[PostController::class,'deletePosts']);
Route::get('restore-post/{id}',[PostController::class,'restorePost']);
Route::get('post-restore-all',[PostController::class,'restoreAll']);

