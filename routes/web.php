<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Models\Request;

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
        Route::get('/', [RequestController::class,'index'])->name('index')->middleware('can:requests.index');
        Route::post('/',[RequestController::class,'store'])->name('store')->middleware('can:requests.store');
        Route::get('/{id}', [RequestController::class,'show'])->name('show')->middleware('can:requests.index');
        Route::put('/{id}', [RequestController::class,'update'])->name('update')->middleware('can:requests.update');
        Route::get('/{id}/response', [RequestController::class,'response'])->name('response')->middleware('can:requests.index');
    });

    Route::prefix('/responses')->name('responses.')->group(function(){
        Route::get('/',[ResponseController::class,'index'])->name('index')->middleware('can:responses.index');
        Route::get('/{id}',[ResponseController::class,'show'])->name('show')->middleware('can:responses.index');
        Route::put('/{id}',[ResponseController::class,'storeResponse'])->name('storeResponse')->middleware('can:responses.update');
    });

    Route::prefix('/folios')->name('folios.')->group(function(){
        Route::get('/createFolio',[ResponseController::class,'createFolioRequisition'])->name('create')->middleware('can:responses.createFolio');
        Route::post('/createFolio',[ResponseController::class,'storeFolioRequisition'])->name('store')->middleware('can:responses.createFolio');
        Route::put('/cancelFolio/{id}',[ResponseController::class,'cancelFolio'])->name('cancelFolio')->middleware('can:responses.update');
    });

    Route::prefix('/areas')->name('areas.')->group(function(){
        Route::get('/',[AreaController::class,'index'])->name('index')->middleware('can:areas.index');
        Route::post('/',[AreaController::class,'store'])->name('store')->middleware('can:areas.store');
        Route::get('/{id}',[AreaController::class,'show'])->name('show')->middleware('can:areas.index');
        Route::get('/{id}/editUsers',[AreaController::class,'editUsers'])->name('editUsers')->middleware('can:areas.update');
        Route::put('/{id}',[AreaController::class,'assignUsers'])->name('assignUsers')->middleware('can:areas.update');
        Route::put('/{id}',[AreaController::class,'update'])->name('update')->middleware('can:areas.update');
    });

    Route::prefix('/users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index')->middleware('can:users.index');
        Route::post('/',[UserController::class,'store'])->name('store')->middleware('can:users.store');
        Route::get('/{id}',[UserController::class,'show'])->name('show')->middleware('can:users.index');
        Route::put('/{id}',[UserController::class,'update'])->name('update')->middleware('can:users.update');
        Route::put('/',[UserController::class,'updateRoles'])->name('updateRoles')->middleware('can:users.update');
        Route::get('/editRoles/{id}',[UserController::class,'editRoles'])->name('editRoles')->middleware('can:users.update');
    });

    Route::prefix('/roles')->name('roles.')->group(function(){
        Route::get('/',[RoleController::class,'index'])->name('index')->middleware('can:roles.index');
        Route::post('/',[RoleController::class,'store'])->name('store')->middleware('can:roles.store');
        Route::put('/',[RoleController::class,'updatePermissions'])->name('updatePermissions')->middleware('can:roles.update');
    });

    Route::prefix('/reports')->name('reports.')->group(function(){
        Route::get('/',[ReportController::class,'index'])->name('index')->middleware('can:reports.index');
        Route::get('/closing',[ReportController::class,'closing'])->name('closing')->middleware('can:reports.index');
        Route::get('/checkClosing',[ReportController::class,'checkClosing'])->name('checkClosing')->middleware('can:reports.index');

        Route::get('/req',function(){
            Request::getRequestReport();
        });
        Route::get('/requests', [ReportController::class, 'exportRequests'])->name('requests')->middleware('can:reports.index');
    });

    

});
