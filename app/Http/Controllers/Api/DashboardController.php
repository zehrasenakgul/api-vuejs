<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Models\Expense;


class DashboardController extends Controller
{
    public function maxExpense()
    {

        $expense = Expense::selectRaw(
            "(COUNT(*)) as count,sum(amount) as sums,EXTRACT(MONTH FROM `date`) as month"
        )
            ->whereYear('date', '=', now()->year)
            ->groupBy('month')
            ->orderBy('sums', 'desc')
            ->first();

        return new DashboardResource($expense);
    }
    public function minExpense()
    {

        $expense = Expense::selectRaw(
            "(COUNT(*)) as count,sum(amount) as sums,EXTRACT(MONTH FROM `date`) as month"
        )
            ->whereYear('date', '=', now()->year)
            ->groupBy('month')
            ->orderBy('sums', 'asc')
            ->first();

        return new DashboardResource($expense);
    }

    public function lastExpense()
    {
        $expense = Expense::orderBy('id', 'desc')->with("category")->first();
        return new DashboardResource($expense);
    }
}
