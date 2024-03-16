<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'fk_department' => rand(1, 5),
                'fk_designation' => rand(1, 5),
                'phone_number' => '99988877' . $i,
            ]);
        }
        
    }
}
