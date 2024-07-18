<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Boss',
            'email' => 'theboss@gmail.com',
            'password' => Hash::make('theboss@gmail.com'),
        ]); 
        

        $this->call([ 
            RoleSeeder::class,  
            CategorySeeder::class,
            ProductSeeder::class,
            OrderStatusSeeder::class,
            PaymentStatusSeeder::class,
        ]);
    }
}
