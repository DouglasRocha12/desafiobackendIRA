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
        $products = [
            [
                'name' => 'Produto 1',
                'description' => 'Descrição do Produto 1',
                'price' => '19.99',
                'expiration_date' => date('Y-m-d', strtotime("+1 month")),
                'id_category' => 1,
                'image' => 'produto1.jpg'
            ],
            [
                'name' => 'Produto 2',
                'description' => 'Descrição do Produto 2',
                'price' => '29.99',
                'expiration_date' => date('Y-m-d', strtotime("+2 months")),
                'id_category' => 2,
                'image' => 'produto2.jpg'
            ],
            [
                'name' => 'Produto 3',
                'description' => 'Descrição do Produto 3',
                'price' => '9.99',
                'expiration_date' => date('Y-m-d', strtotime("+3 months")),
                'id_category' => 1,
                'image' => 'produto3.jpg'
            ],
            [
                'name' => 'Produto 4',
                'description' => 'Descrição do Produto 4',
                'price' => '49.99',
                'expiration_date' => date('Y-m-d', strtotime("+4 months")),
                'id_category' => 3,
                'image' => 'produto4.jpg'
            ],
            [
                'name' => 'Produto 5',
                'description' => 'Descrição do Produto 5',
                'price' => '14.99',
                'expiration_date' => date('Y-m-d', strtotime("+5 months")),
                'id_category' => 2,
                'image' => 'produto5.jpg'
            ],
            [
                'name' => 'Produto 6',
                'description' => 'Descrição do Produto 6',
                'price' => '24.99',
                'expiration_date' => date('Y-m-d', strtotime("+6 months")),
                'id_category' => 1,
                'image' => 'produto6.jpg'
            ],
            [
                'name' => 'Produto 7',
                'description' => 'Descrição do Produto 7',
                'price' => '34.99',
                'expiration_date' => date('Y-m-d', strtotime("+7 months")),
                'id_category' => 3,
                'image' => 'produto7.jpg'
            ],
            [
                'name' => 'Produto 8',
                'description' => 'Descrição do Produto 8',
                'price' => '12.99',
                'expiration_date' => date('Y-m-d', strtotime("+8 months")),
                'id_category' => 2,
                'image' => 'produto8.jpg'
            ],
            [
                'name' => 'Produto 9',
                'description' => 'Descrição do Produto 9',
                'price' => '59.99',
                'expiration_date' => date('Y-m-d', strtotime("+9 months")),
                'id_category' => 1,
                'image' => 'produto9.jpg'
            ],
            [
                'name' => 'Produto 10',
                'description' => 'Descrição do Produto 10',
                'price' => '17.99',
                'expiration_date' => date('Y-m-d', strtotime("+10 months")),
                'id_category' => 3,
                'image' => 'produto10.jpg'
            ],
            [
                'name' => 'Produto 11',
                'description' => 'Descrição do Produto 11',
                'price' => '22.99',
                'expiration_date' => date('Y-m-d', strtotime("+11 months")),
                'id_category' => 2,
                'image' => 'produto11.jpg'
            ],
            [
                'name' => 'Produto 12',
                'description' => 'Descrição do Produto 12',
                'price' => '8.99',
                'expiration_date' => date('Y-m-d', strtotime("+12 months")),
                'id_category' => 1,
                'image' => 'produto12.jpg'
            ],
            [
                'name' => 'Produto 13',
                'description' => 'Descrição do Produto 13',
                'price' => '39.99',
                'expiration_date' => date('Y-m-d', strtotime("+1 month")),
                'id_category' => 3,
                'image' => 'produto13.jpg'
            ],
            [
                'name' => 'Produto 14',
                'description' => 'Descrição do Produto 14',
                'price' => '15.99',
                'expiration_date' => date('Y-m-d', strtotime("+2 months")),
                'id_category' => 1,
                'image' => 'produto14.jpg'
            ],
            [
                'name' => 'Produto 15',
                'description' => 'Descrição do Produto 15',
                'price' => '27.99',
                'expiration_date' => date('Y-m-d', strtotime("+3 months")),
                'id_category' => 2,
                'image' => 'produto15.jpg'
            ],
            [
                'name' => 'Produto 16',
                'description' => 'Descrição do Produto 16',
                'price' => '11.99',
                'expiration_date' => date('Y-m-d', strtotime("+4 months")),
                'id_category' => 3,
                'image' => 'produto16.jpg'
            ],
            [
                'name' => 'Produto 17',
                'description' => 'Descrição do Produto 17',
                'price' => '44.99',
                'expiration_date' => date('Y-m-d', strtotime("+5 months")),
                'id_category' => 1,
                'image' => 'produto17.jpg'
            ],
            [
                'name' => 'Produto 18',
                'description' => 'Descrição do Produto 18',
                'price' => '18.99',
                'expiration_date' => date('Y-m-d', strtotime("+6 months")),
                'id_category' => 2,
                'image' => 'produto18.jpg'
            ],
            [
                'name' => 'Produto 19',
                'description' => 'Descrição do Produto 19',
                'price' => '31.99',
                'expiration_date' => date('Y-m-d', strtotime("+7 months")),
                'id_category' => 1,
                'image' => 'produto19.jpg'
            ],
            [
                'name' => 'Produto 20',
                'description' => 'Descrição do Produto 20',
                'price' => '9.99',
                'expiration_date' => date('Y-m-d', strtotime("+8 months")),
                'id_category' => 3,
                'image' => 'produto20.jpg'
            ],
        ];

        foreach ($products as $product) {
            product::create($product);
        }
    }
}
