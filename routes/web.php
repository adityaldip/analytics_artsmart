<?php
use App\Http\Controllers\ReportsController;
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
Route::get('/', [ReportsController::class, 'index'])->name('index');
Route::get('/home', [ReportsController::class, 'home'])->name('home');
Route::get('/error-data', [ReportsController::class, 'data'])->name('error.data');
Route::get('/model-data', [ReportsController::class, 'modelData'])->name('graph.model.data');
Route::get('/feature-data', [ReportsController::class, 'featureData'])->name('graph.feature.data');
Route::get('/graph-error-data', [ReportsController::class, 'errorData'])->name('graph.error.data');

Auth::routes();
