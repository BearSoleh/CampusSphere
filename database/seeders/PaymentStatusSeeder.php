<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentStatus;

class PaymentStatusSeeder extends Seeder
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
                'payment_status' => 'Pending'
            ],
            [
                'payment_status' => 'Approved'
            ],
            [
                'payment_status' => 'Reject'
            ],
        ];
        foreach ($datas as $data)
        {
            PaymentStatus::Create($data);
        }
        //
    }
} 
