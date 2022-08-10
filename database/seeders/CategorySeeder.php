<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Fatura',
            ],
            [
                'name' => 'Borç',
            ],
            [
                'name' => 'Vergi',
            ],
            [
                'name' => 'Hesap',
            ]
        ];

        foreach ($category as  $value) {
            Category::create($value);
        }
    }
}
