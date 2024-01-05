<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\BlockList;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlacklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['email' => 'izzat@theboom.group', 'company' => 'The Boom Group Sdn Bhd', 'contact' => '011-32775165', 'name' => ''],
            ['email' => 'izzat@theboom.group', 'company' => 'Hausboom', 'contact' => '014-2680266', 'name' => 'HAZIQ'],
            ['email' => 'sucjita@hamburgerasia.com', 'company' => 'Hamburger Asia Sdn. Bhd.', 'contact' => '011-3994 1844', 'name' => ''],
            ['email' => 'mira@hamburgerasia.com', 'company' => 'Hamburger Asia Sdn. Bhd.', 'contact' => '03-7848 5962', 'name' => ''],
            ['email' => 'lili@hamburgerasia.com', 'company' => 'Hamburger Asia Sdn. Bhd.', 'contact' => '016-3385341', 'name' => ''],
            ['email' => 'nishi@hamburgerasia.com', 'company' => 'Hamburger Asia Sdn. Bhd.', 'contact' => '016-3385341', 'name' => ''],
            ['email' => 'sales.pgr23@gmail.com', 'company' => 'Tune Advertising Sdn Bhd', 'contact' => '019-8134831', 'name' => ''],
            ['email' => 'sales.pgr23@gmail.com', 'company' => 'Tune Advertising Sdn Bhd', 'contact' => '011-26260273', 'name' => ' '],
            ['email' => 'sales.pgr23@gmail.com', 'company' => 'Tune Advertising Sdn Bhd', 'contact' => '017-6799459', 'name' => ''],
            ['email' => 'sales.pgr23@gmail.com', 'company' => 'Tune Advertising Sdn Bhd', 'contact' => '014-511 6014', 'name' => ''],
           
            
        ];

        foreach ($user as $value) {
            BlockList::insert([
                'email' => $value['email'],
                'company_name' => $value['company'],
                'contact_number' => $value['contact'],
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
