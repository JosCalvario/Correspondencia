<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',[CorrespondenceController::class,'index'])->name('index');

    Route::prefix('/requests')->name('requests.')->group(function(){
        Route::get('/', [RequestController::class,'index'])->name('index');
        Route::post('/',[RequestController::class,'store'])->name('store');
    });
    
    Route::prefix('/folios')->name('folios.')->group(function(){
        Route::get('/createFolio',[CorrespondenceController::class,'createFolio'])->name('create');
        Route::post('/createFolio',[CorrespondenceController::class,'storeFolio'])->name('store');
    });

    Route::prefix('/users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
    })->middleware('can:users.index');
});
