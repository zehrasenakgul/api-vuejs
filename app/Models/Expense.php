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
}
