<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\auth;
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('permissions',[PermissionController::class]);
// Route::group(['middleware'=>'auth'],function(){
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete',[PermissionController::class,'destroy']);
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete',[RoleController::class,'destroy']);
    Route::get('roles/{roleId}/give-permissions',[RoleController::class,'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete',[UserController::class,'destroy']);

// });

  


