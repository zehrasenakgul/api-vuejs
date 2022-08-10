<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Models\Expense;


class DashboardController extends Controller
{

    public function maxExpense()
    {
        return Expense::maxMin("desc");
    }
    public function minExpense()
    {
        return Expense::maxMin("asc");
    }
    public function lastExpense()
    {
        return Expense::orderBy('date', 'desc')->with("category")->first();
    }
    public function expensesThisMonth()
    {
        return Expense::getExpensesMonthOrYear("month");
    }
    public function expensesThisYear()
    {
        return Expense::getExpensesMonthOrYear("year");
    }
    public function totalExpenseThisMonth()
    {
        return Expense::totalExpenseMonthOrYear("month");
    }
    public function totalExpenseThisYear()
    {
        return Expense::totalExpenseMonthOrYear("year");
    }
    public function years()
    {
        return Expense::years();
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



    public function categoryByYear()
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
        return $return;
    }
}
