<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::redirect('/','/view-items');

Route::get('/view-items', [App\Http\Controllers\ItemController::class,'index']);

Route::post('/save-items', [App\Http\Controllers\ItemController::class,'store']);

Route::post('/delete-item',[App\Http\Controllers\ItemController::class,'destroy']);

Route::post('/update-item',[App\Http\Controllers\ItemController::class,'update']);
