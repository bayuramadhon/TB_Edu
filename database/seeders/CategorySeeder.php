<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::trunCate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic', 'novel', 'western', 'fiction', 'fantasy', 'mystery',
            'horror', 'romance'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
