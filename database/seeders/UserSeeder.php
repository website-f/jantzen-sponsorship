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
            'name' => 'admin',
            'email' => 'admin@demo.com',
            'role_id' => 1,
            'password' => '$2a$12$VnWu8ZSbkvKwwt9aCHkHQ.pBxdCkBrgLSEq7jb036R88iHPyckGqS',
            'vendor_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
