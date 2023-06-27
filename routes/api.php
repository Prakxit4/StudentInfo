<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

Route::get('get', [ApiController::class, 'index']);
Route::post('post', [ApiController::class, 'store']);
Route::put('put/{studentClass}', [ApiController::class, 'update']);
Route::delete('delete/{studentClass}', [ApiController::class, 'destroy']);


