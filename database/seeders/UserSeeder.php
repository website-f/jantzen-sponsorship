<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'master',
            'email' => 'master@jantzen.com.my',
            'role_id' => 1,
            'password' => '$2a$12$2Yga4Wi3t6Huc36lcruffujLg7hAzM7tZtwqfF463VWG.EaBkntgW',
            'vendor_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
