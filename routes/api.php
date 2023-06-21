<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\TransportationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Api company
Route::get('/data-company', [CompanyController::class, 'index']);
Route::post('/data-company/{id}', [CompanyController::class, 'update']); //Edit data company
Route::post('/data-company', [CompanyController::class, 'create']);
Route::patch('/data-company/{id}', [CompanyController::class, 'edit']);

// Api user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'indexById']);
Route::post('/user', [UserController::class, 'create']);

// Customer
Route::post('/customer', [CustomerController::class, 'create']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'indexById']);
Route::post('/edit-customer/{id}', [CustomerController::class, 'update']);
Route::get('/filter/customer', [CustomerController::class, 'filterDate']);

// Transportation
Route::post('/transportation', [TransportationController::class, 'create']);
Route::get('/transportation/{id}', [TransportationController::class, 'index']);
Route::post('/edit-transportation/{id}', [TransportationController::class, 'update']);
Route::delete('/delete-transportation/{id}', [TransportationController::class, 'destroy']);

// Invoce
Route::post('/invoce/create', [InvoiceController::class, 'create']);