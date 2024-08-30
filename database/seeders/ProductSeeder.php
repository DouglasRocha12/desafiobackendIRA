<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::create([
            'id' => '1',
            'description' => 'Teste',
            'name' => 'Teste',
            'price'=> '10.00',
            'expiration_date' => date('Y-m-d',strtotime("+1 month",date('Y-m-d')))
        ]);
    }
}
