<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@shopease.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@shopease.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]);
            $this->command->info('Admin user created successfully!');
        } else {
            $this->command->info('Admin user already exists!');
        }
    }
}