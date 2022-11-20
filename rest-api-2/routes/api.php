<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// METHOD GET - GET ALL RESOURCE
Route::get('/patients', [PatientController::class, 'index']);
// METHOD POST - ADD RESOURCE
Route::post('/patients', [PatientController::class, 'store']);
// METHOD GET - GET DETAIL RESOURCE
Route::get('/patients/{id}', [PatientController::class, 'show']);
// METHOD PUT - UPDATE RESOURCE
Route::put('/patients/{id}', [PatientController::class, 'update']);
// METHOD DELETE - DELETE RESOURCE
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
// METHOD GET - SEARCH RESOURCE BY NAME
Route::get('/patients/search/{name}', [PatientController::class, 'search']);
// METHOD GET - GET POSITIVE RESOURCE
Route::get('/patients/status/positive', [PatientController::class, 'positive']);
// METHOD GET - GET RECOVERED RESOURCE
Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);
// METHOD GET - GET DEAD RESOURCE
Route::get('/patients/status/dead', [PatientController::class, 'dead']);






// //method get 
// Route::get('/animals', [AnimalController::class, 'index']);

// //method post
// Route::post('/animals', [AnimalController::class, 'store']);

// //method put
// Route::put('/animals/{id}', [AnimalController::class, 'update']);

// //method delete
// Route::delete('/animals/{id}',[AnimalController::class, 'destroy']);


// // get all resource student
// // method get
// Route::get('/students', [StudentController::class, 'index']);

// // menambahkan resource student
// // method post
// Route::post('/students', [StudentController::class, 'store']);

// // mendapatkan detail resource student
// // method get
// Route::get('/students{id}', [StudentController::class, 'show']);

// // memperbaharui resource student
// // method put
// Route::put('/students{id}', [StudentController::class, 'update']);

// // menghapus resource student
// // method delete
// Route::delete('/students{id}', [StudentController::class, 'destroy']);