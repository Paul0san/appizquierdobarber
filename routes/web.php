<?php

use App\Http\Livewire\Barbers;
use App\Http\Livewire\MainPanel;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Sales;
use App\Http\Livewire\Services;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified','checkType'])->group(function () {
    Route::get('panel/inicio', MainPanel::class)->name('dashboard');
    Route::get('panel/ventas', Sales::class)->name('sales');
    Route::get('panel/barbers', Barbers::class)->name('barbers');
    Route::get('panel/servicios', Services::class)->name('services');
    Route::get('panel/reportes', Reports::class)->name('reports');
    Route::post('panel/reporte/ejemplo', [Reports::class, 'reportView'])->name('reportView');
});

Route::get('barbers/home', function(){
    return view('barbersHome');
})->name('barber-home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');

// })->name('dashboard');
