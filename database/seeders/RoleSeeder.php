<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
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
                'role' => 'User'
            ],
            [
                'role' => 'Admin'
            ],
        ];
        foreach ($datas as $data)
        {
            Role::Create($data);
        }
        //
    }
} 
