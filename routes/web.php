<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ExpenseController;
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

Route::controller(DashboardController::class)->group(function () {
    Route::group(["prefix" => "api/dashboard", "as" => "api.dashboard"], function () {
        Route::get("/maxExpense", "maxExpense")->name(".maxExpense");
        Route::get("/minExpense", "minExpense")->name(".minExpense");
        Route::get("/lastExpense", "lastExpense")->name(".lastExpense");
    });
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories', function () {
    return view('layouts.categories.categories');
})->middleware(['auth'])->name('categories');

Route::get('/expenses', function () {
    return view('layouts.expenses.expenses');
})->middleware(['auth'])->name('expenses');




require __DIR__ . '/auth.php';
