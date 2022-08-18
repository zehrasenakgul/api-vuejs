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
        return $this->belongsTo(Category::class);
    }

    public static function getMaxMin($orderBy)
    {
        $item = Expense::selectRaw(
            "(COUNT(*)) as count,sum(amount) as sums,EXTRACT(MONTH FROM `date`) as month"
        )
            ->whereYear('date', '=', now()->year)
            ->groupBy("month")
            ->orderBy('sums', $orderBy)
            ->first();

        return response()->json([
            'data' => $item
        ]);
    }
}
