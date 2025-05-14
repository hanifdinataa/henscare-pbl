<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IotDataController;
use App\Models\IotData;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/iot', [IotDataController::class, 'store']);
Route::get('/get-iot', function () {
    return response()->json(IotData::latest()->first());
});

Route::get('/get-iot', [IotDataController::class, 'getData']);
Route::get('/iot', [IotDataController::class, 'index']);
Route::get('/iot-data', function () {
    $data = IotData::latest()->first();
    return response()->json($data);
});