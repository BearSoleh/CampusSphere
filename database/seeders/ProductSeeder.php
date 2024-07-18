<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'seller_id' => '1',
                'category_id' => '1',
                'name' => 'Test Product',
                'description' => 'Test Product Desc',
                'price' => '500.00',
                'photo' => 'dd.jpg',
            ],
            [
                'seller_id' => '1',
                'category_id' => '1',
                'name' => 'Test Product 2',
                'description' => 'Test Product 2 Desc',
                'price' => '900.00',
                'photo' => 'Capture.jpg',
            ],
        ];
        foreach ($datas as $data)
        {
            Product::Create($data);
        }
        //
    }
} 
