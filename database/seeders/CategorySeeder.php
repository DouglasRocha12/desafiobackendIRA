<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create([
            'description' => 'Eletrônicos'
        ]);

        category::create([
            'description' => 'Roupas'
        ]);

        category::create([
            'description' => 'Alimentos'
        ]);
    }
}
