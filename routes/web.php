<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CitizenshipController;
use App\Http\Controllers\DistricController;
use App\Http\Controllers\DivitionController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::fallback(function () {
    return view('error_page.error_page_404');
});

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/gs_dashboard', [AuthController::class, 'gs_dashboard'])->name('gs_dashboard');
Route::get('/admin_dashboard', [AuthController::class, 'admin_dashboard'])->name('admin_dashboard');


// citizenship routing
Route::get('/citizenship', [CitizenshipController::class, 'index'])->name('citizenship');;
Route::post('/citizenship_store', [CitizenshipController::class, 'store'])->name('citizenship_store');
Route::get('/citizenship_show', [CitizenshipController::class, 'show'])->name('citizenship_show');
Route::get('/citizenship_edit', [CitizenshipController::class, 'edit'])->name('citizenship_edit');
Route::post('/citizenship_update', [CitizenshipController::class, 'update'])->name('citizenship_update');
Route::delete('/citizenship_delete', [CitizenshipController::class, 'delete'])->name('citizenship_delete');


// province routing
Route::get('/province', [ProvinceController::class, 'index'])->name('province');;
Route::post('/province_store', [ProvinceController::class, 'store'])->name('province_store');
Route::get('/province_show', [ProvinceController::class, 'show'])->name('province_show');
Route::get('/province_edit', [ProvinceController::class, 'edit'])->name('province_edit');
Route::post('/province_update', [ProvinceController::class, 'update'])->name('province_update');
Route::delete('/province_delete', [ProvinceController::class, 'delete'])->name('province_delete');

// district routing
Route::get('/district', [DistricController::class, 'index'])->name('district');;
Route::post('/district_store', [DistricController::class, 'store'])->name('district_store');
Route::get('/district_show', [DistricController::class, 'show'])->name('district_show');
Route::get('/district_edit', [DistricController::class, 'edit'])->name('district_edit');
Route::post('/district_update', [DistricController::class, 'update'])->name('district_update');
Route::delete('/district_delete', [DistricController::class, 'delete'])->name('district_delete');

// divition routing
Route::get('/divition', [DivitionController::class, 'index'])->name('divition');;
Route::post('/divition_store', [DivitionController::class, 'store'])->name('divition_store');
Route::get('/divition_show', [DivitionController::class, 'show'])->name('divition_show');
Route::get('/divition_edit', [DivitionController::class, 'edit'])->name('divition_edit');
Route::post('/divition_update', [DivitionController::class, 'update'])->name('divition_update');
Route::delete('/divition_delete', [DivitionController::class, 'delete'])->name('divition_delete');

// party routing
Route::get('/party', [PartyController::class, 'index'])->name('party');
Route::post('/party_store', [PartyController::class, 'store'])->name('party_store');
Route::get('/party_show', [PartyController::class, 'show'])->name('party_show');
Route::get('/party_edit', [PartyController::class, 'edit'])->name('party_edit');
Route::post('/party_update', [PartyController::class, 'update'])->name('party_update');
Route::delete('/party_delete', [PartyController::class, 'delete'])->name('party_delete');

// candidate routing
Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate');
Route::post('/candidate_store', [CandidateController::class, 'store'])->name('candidate_store');
Route::get('/candidate_show', [CandidateController::class, 'show'])->name('candidate_show');
Route::get('/candidate_edit', [CandidateController::class, 'edit'])->name('candidate_edit');
Route::post('/candidate_update', [CandidateController::class, 'update'])->name('candidate_update');
Route::delete('/candidate_delete', [CandidateController::class, 'delete'])->name('candidate_delete');
