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
        Route::get("/getMaxExpense", "getMaxExpense")->name(".getMaxExpense");
        Route::get("/getMinExpense", "getMinExpense")->name(".getMinExpense");
        Route::get("/getLastExpense", "getLastExpense")->name(".getLastExpense");
        Route::get("/getExpensesThisMonth", "getExpensesThisMonth")->name(".getExpensesThisMonth");
        Route::get("/getExpensesThisYear", "getExpensesThisYear")->name(".getExpensesThisYear");
        Route::get("/getTotalExpenseThisMonth", "getTotalExpenseThisMonth")->name(".getTotalExpenseThisMonth");
        Route::get("/getTotalExpenseThisYear", "getTotalExpenseThisYear")->name(".getTotalExpenseThisYear");
        Route::get("/getSpendingRepeat", "getSpendingRepeat")->name(".getSpendingRepeat");
        Route::get("/getExpensesByMonthYear", "getExpensesByMonthYear")->name(".getExpensesByMonthYear");
        Route::get("getCategoryByYear", "getCategoryByYear")->name(".getCategoryByYear");
        Route::get("/getYears", "getYears")->name(".getYears");
    });
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard.dashboard');
})->name('dashboard');

Route::get('/categories', function () {
    return view('layouts.categories.categories');
})->name('categories');

Route::get('/expenses', function () {
    return view('layouts.expenses.expenses');
})->name('expenses');




require __DIR__ . '/auth.php';
