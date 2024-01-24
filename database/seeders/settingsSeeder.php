<?php

namespace Database\Seeders;

use App\Models\settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'proName' => "Ababeel",
                'phone' => '03123456789',
                'mobile' => '03123456789',
                'addr_line_one' => 'Shop No. 123',
                'addr_line_two' => 'Abc Plaza',
                'addr_line_three' => 'Quetta',
            ]
            ];

        foreach ($settings as $key => $setting)
        {
           settings::create($setting);
        }
    }
}
