<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['role' => 'SuperAdmin'],
            ['role' => 'Admin'],
            ['role' => 'Staff'],
            ['role' => 'Public']
        ];

        foreach ($data as $value) {
            Role::insert([
                'name' => $value['role'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
