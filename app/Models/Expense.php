<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ["amount", "spending", "category_id", "date"];


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public static function maxMin($orderBy)
    {
        return Expense::selectRaw(
            "(COUNT(*)) as count,sum(amount) as sums,EXTRACT(MONTH FROM `date`) as month"
        )
            ->whereYear('date', '=', now()->year)
            ->groupBy("month")
            ->orderBy('sums', $orderBy)
            ->first();
    }

    public static function getExpensesMonthOrYear($value)
    {
        switch ($value) {
            case 'month':
                return Expense::whereMonth('date', '=', now()->month)
                    ->with("category")
                    ->whereYear('date', '=', now()->year)
                    ->orderBy('date', 'asc')
                    ->get();
                break;
            default:
                return Expense::with("category")
                    ->whereYear('date', '=', now()->year)
                    ->orderBy('date', 'asc')
                    ->get();
        }
    }
    public static function totalExpenseMonthOrYear($value)
    {
        switch ($value) {
            case 'month':
                return  Expense::selectRaw(
                    "sum(amount) as sums"
                )
                    ->whereYear('date', '=', now()->year)
                    ->whereMonth('date', '=', now()->month)
                    ->first();
                break;
            default:
                return  Expense::selectRaw(
                    "sum(amount) as sums"
                )
                    ->whereYear('date', '=', now()->year)
                    ->first();
                break;
        }
    }

    public static function years()
    {
        return Expense::selectRaw(
            "EXTRACT(YEAR FROM `date`) as year"
        )
            ->groupBy("year")
            ->orderBy('year', 'desc')
            ->get();
    }
}
