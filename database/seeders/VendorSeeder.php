<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::insert([
            'name' => 'Jantzen',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
