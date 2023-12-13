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
        $user = [
            // ['name' => 'Master', 'email' => 'master@jantzen.com.my', 'role_id' => 1, 'vendor_id' => 1],
            // ['name' => 'Admin', 'email' => 'admin@demo.com', 'role_id' => 1, 'vendor_id' => 1],
            // ['name' => 'Umi', 'email' => 'umi@jantzen.com.my', 'role_id' => 2, 'vendor_id' => 1],
            // ['name' => 'Hanis', 'email' => 'hanis@jantzen.com.my', 'role_id' => 2, 'vendor_id' => 1]
            ['name' => 'Fitri', 'email' => 'fitri@jantzen.com.my', 'role_id' => 2, 'vendor_id' => 1],
            ['name' => 'Aliessa', 'email' => 'aliessa@jantzen.com.my', 'role_id' => 2, 'vendor_id' => 1],
            ['name' => 'Naomis', 'email' => 'naomis@jantzen.com.my', 'role_id' => 2, 'vendor_id' => 1]
        ];

        foreach ($user as $value) {
            User::insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'role_id' => $value['role_id'],
                'password' => '$2a$12$59fajpvpEtn/yV1Ea5OQNOf0TcMTgHZ87yr76R7NcP6NWoO1hr1n2',
                'vendor_id' => $value['vendor_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
