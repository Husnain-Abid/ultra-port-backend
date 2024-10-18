<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatingSystemController;
use App\Http\Controllers\ProcessorController;
use App\Http\Controllers\MotherboardController;
use App\Http\Controllers\GraphicsCardController;
use App\Http\Controllers\HousingController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\CoolerAioController;
use App\Http\Controllers\SsdController;
use App\Http\Controllers\HardDiskController;
use App\Http\Controllers\ReaderWriterController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CaseFanController;
use App\Http\Controllers\WiFiController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/welcome', function () {
    return response()->json([
        'message' => 'Server is working',
        'status' => 200
    ]);
});



Route::apiResource('operating-systems', OperatingSystemController::class);
Route::apiResource('processors', ProcessorController::class);
Route::apiResource('motherboards', MotherboardController::class);
Route::apiResource('graphics-cards', GraphicsCardController::class);
Route::apiResource('housings', HousingController::class);
Route::apiResource('rams', RamController::class);
Route::apiResource('cooler-aios', CoolerAioController::class);
Route::apiResource('ssds', SsdController::class);
Route::apiResource('hard-disks', HardDiskController::class);
Route::apiResource('reader-writers', ReaderWriterController::class);
Route::apiResource('foods', FoodController::class);
Route::apiResource('case-fans', CaseFanController::class);
Route::apiResource('wi-fis', WiFiController::class);
Route::apiResource('mice', MouseController::class);
Route::apiResource('screens', ScreenController::class);
Route::apiResource('accessories', AccessoryController::class);
Route::apiResource('software', SoftwareController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('orders', OrderController::class);














