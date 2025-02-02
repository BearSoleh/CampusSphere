<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
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
                'status' => 'New'
            ],
            [
                'status' => 'In Process'
            ],
            [
                'status' => 'Completed'
            ],
        ];
        foreach ($datas as $data)
        {
            OrderStatus::Create($data);
        }
        //
    }
} 
