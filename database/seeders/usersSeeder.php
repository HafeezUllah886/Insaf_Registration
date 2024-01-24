<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(
            [
                'username' => 'System',
                'email' => 'system@email.com',
                'password' => Hash::make('unknownsystem'),
                'lang' => 'en',
                'user_role' => 'System',
            ]
        );
        $user = User::create(
            [
                'username' => 'Admin',
                'email' => 'Admin@email.com',
                'password' => Hash::make('admin'),
                'lang' => 'en',
                'user_role' => 'Admin',
            ]
        );

        User::create(
            [
                'username' => 'Member',
                'email' => 'member@email.com',
                'password' => Hash::make('member'),
                'lang' => 'en',
                'user_role' => 'Member'
            ]
        );
    }
}
