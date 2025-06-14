<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Saleperson;
use App\Models\Role;
class SalepersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $role = Role::firstOrCreate(['name' => 'salesperson']);

       Saleperson::create([
        'name' => 'Sales User',
        'email' => 'sales@example.com',
        'password' => bcrypt('987654321'),
        'role_id' => $role->id,
       ]);
    }
}
