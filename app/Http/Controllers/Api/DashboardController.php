<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Models\Expense;


class DashboardController extends Controller
{

    public function getMaxExpense()
    {
        return Expense::getMaxMin("desc");
    }
    public function getMinExpense()
    {
        return Expense::getMaxMin("asc");
    }
    public function getLastExpense()
    {
        $getLastExpense = Expense::orderBy('date', 'desc')->with("category")->first();
        return new DashboardResource($getLastExpense);
    }
    public function getExpensesThisMonth()
    {
        $item = Expense::whereMonth('date', '=', now()->month)
            ->with("category")
            ->whereYear('date', '=', now()->year)
            ->orderBy('date', 'asc')
            ->get();
        return new DashboardResource($item);
    }
    public function getExpensesThisYear()
    {
        $item = Expense::with("category")
            ->whereYear('date', '=', now()->year)
            ->orderBy('date', 'asc')
            ->get();
        return new DashboardResource($item);
    }
    public function getYears()
    {
        $years = Expense::selectRaw(
            "EXTRACT(YEAR FROM `date`) as year"
        )
            ->groupBy("year")
            ->orderBy('year', 'desc')
            ->get();

        return new DashboardResource($years);
    }
    public function getTotalExpenseThisMonth()
    {
        $item =  Expense::selectRaw(
            "sum(amount) as sums"
        )
            ->whereYear('date', '=', now()->year)
            ->whereMonth('date', '=', now()->month)
            ->first();

        return new DashboardResource($item);
    }
    public function getTotalExpenseThisYear()
    {
        $item = Expense::selectRaw(
            "sum(amount) as sums"
        )
            ->whereYear('date', '=', now()->year)
            ->first();
        return new DashboardResource($item);
    }
    public function getSpendingRepeat()
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
        return new DashboardResource($return);
    }

    public function getExpensesByMonthYear()
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
        return new DashboardResource($return);
    }

    public function getCategoryByYear()
    {
        $expenses = Expense::select("category_id")
            ->selectRaw(
                "EXTRACT(YEAR FROM `date`) as year"
            )
            ->groupBy("year", "category_id")
            ->with("category")
            ->orderBy('year', 'desc')
            ->get();

        $return = array();
        foreach ($expenses as $val) {
            $return[$val->year][] = $val;
        }
        return new DashboardResource($return);
    }
}
