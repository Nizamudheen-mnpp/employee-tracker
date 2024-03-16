<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::create(['name' => 'Manager']);
        Designation::create(['name' => 'Team Leader']);
        Designation::create(['name' => 'Senior Developer']);
        Designation::create(['name' => 'HR Executive']);
        Designation::create(['name' => 'Accountant']);
        
    }
}
