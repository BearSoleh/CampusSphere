<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
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
                'category' => 'Home & Living'
            ],
            [
                'category' => 'Watches'
            ],
        ];
        foreach ($datas as $data)
        {
            Category::Create($data);
        }
        //
    }
} 
