<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'first_name' => 'Ryan',
            'last_name' => 'Thorp',
            'email' => 'ryan@ryanthorp.co.uk',
            'password' => Hash::make('PasswordA!'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // // Create a demo company
        // $company = Company::create([
        //     'name' => 'Demo Company',
        //     'logo' => 'https://placehold.co/600x400',
        //     'description' => 'Demo Company Description',
        //     'cvr_number' => '1234567890',
        //     'billing_email' => 'demo@example.com',
        // ]);

        // // Create a manager
        // $manager = User::create([
        //     'first_name' => 'Demo',
        //     'last_name' => 'Manager',
        //     'email' => 'manager@example.com',
        //     'password' => Hash::make('password'),
        //     'company_id' => $company->id,
        //     'email_verified_at' => now(),
        // ]);
        // $manager->assignRole('manager');

        // // Create a standard user
        // $user = User::create([
        //     'first_name' => 'Demo',
        //     'last_name' => 'User',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('password'),
        //     'company_id' => $company->id,
        //     'email_verified_at' => now(),
        // ]);
        // $user->assignRole('user');
    }
} 