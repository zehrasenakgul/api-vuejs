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
        $expense = Expense::orderBy('date', 'desc')->with("category")->first();
        return new DashboardResource($expense);
    }

    public function expensesThisMonth()
    {
        $expense = Expense::whereMonth('date', '=', now()->month)
            ->with("category")
            ->whereYear('date', '=', now()->year)
            ->orderBy('date', 'asc')
            ->get();

        return new DashboardResource($expense);
    }

    public function totalExpenseThisMonth()
    {
        $expense = Expense::selectRaw(
            "sum(amount) as sums"
        )
            ->whereYear('date', '=', now()->year)
            ->whereMonth('date', '=', now()->month)
            ->first();

        return new DashboardResource($expense);
    }

    public function years()
    {
        $years = Expense::selectRaw(
            "EXTRACT(YEAR FROM `date`) as year"
        )
            ->groupBy("year")
            ->orderBy('year', 'desc')
            ->get();
        return new DashboardResource($years);
    }

    public function spendingRepeat()
    {
        $expenses = Expense::select("spending")->selectRaw(
            "(COUNT(spending)) as count,EXTRACT(YEAR FROM `date`) as year"
        )
            ->groupBy("year", "spending")
            ->orderBy('year', 'desc')
            ->get();

        $return = array();
        foreach ($expenses as $val) {
            $return[$val->year][] = $val;
        }
        return $return;
    }

    public function byMonthYear()
    {
        $expenses = Expense::selectRaw(
            "(COUNT(spending)) as count,sum(amount) as sums,EXTRACT(YEAR FROM `date`) as year,EXTRACT(MONTH FROM `date`) as month"
        )
            ->groupBy("year", "month")
            ->orderBy('year', 'desc')
            ->get();

        $return = array();
        foreach ($expenses as $val) {
            $return[$val->year][] = $val;
        }
        return $return;
    }

    public function totalExpenseThisYear()
    {
        $expense = Expense::selectRaw(
            "sum(amount) as sums"
        )
            ->whereYear('date', '=', now()->year)
            ->first();

        return new DashboardResource($expense);
    }

    public function expensesThisYear()
    {
        $expense = Expense::with("category")
            ->whereYear('date', '=', now()->year)
            ->orderBy('date', 'asc')
            ->get();

        return new DashboardResource($expense);
    }
}
