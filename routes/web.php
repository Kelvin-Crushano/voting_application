<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitizenshipController;
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
