<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@schoolevent.com'],
            [
                'name' => 'Admin SchoolEvent',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@schoolevent.com'],
            [
                'name' => 'User Biasa',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );
    }
}
