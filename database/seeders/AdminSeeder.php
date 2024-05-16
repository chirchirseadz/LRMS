<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $user = User::create([
            
            'name' => 'Admin',
            'email' => 'admin@rms.com',
            'password' => Hash::make('password'),
       
        ]);
        $user->assignRole('admin');
    }
}
