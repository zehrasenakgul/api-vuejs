<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $expenses = Expense::selectRaw(
            "(COUNT(*)) as count,sum(amount) as sums,EXTRACT(MONTH FROM `date`) as month"
        )
            ->with('category')
            ->groupBy('month')
            ->whereYear('date', '=', now()->year)
            ->get();
        return $expenses;
    }
}
