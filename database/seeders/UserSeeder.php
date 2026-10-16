<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Default Admin
        User::create([
            'name'         => 'System Admin',
            'age'          => 30,
            'phone_number' => '09123456789',
            'email'        => 'admin@scout.com',
            'gender'       => 'female',
            'birthday'     => '1996-01-01',
            'school'       => null, //oversees all schools
            'password'     => Hash::make('password123'),
            'role'         => 'admin',
            'rank'         => null,
            'status'       => 'approved',
        ]);

        // Default Approved Scout Leader
        User::create([
            'name'         => 'Leader John',
            'age'          => 35,
            'phone_number' => '09123456788',
            'email'        => 'leader@scout.com',
            'gender'       => 'male',
            'birthday'     => '1991-05-15',
            'school'       => 'Pasay City West High School',
            'password'     => Hash::make('password123'),
            'role'         => 'scout_leader',
            'rank'         => 'Scoutmaster',
            'status'       => 'approved',
        ]);

        // Default Pending Scout Leader
        User::create([
            'name'         => 'Pending Leader Mark',
            'age'          => 28,
            'phone_number' => '09123456787',
            'email'        => 'pending@scout.com',
            'gender'       => 'male',
            'birthday'     => '1998-08-20',
            'school'       => 'Pasay City East High School',
            'password'     => Hash::make('password123'),
            'role'         => 'scout_leader',
            'rank'         => 'Assistant Scoutmaster',
            'status'       => 'pending',
        ]);

        // Default Senior Scout
        User::create([
            'name'         => 'Scout Alex',
            'age'          => 17,
            'phone_number' => '09123456786',
            'email'        => 'scout@scout.com',
            'gender'       => 'male',
            'birthday'     => '2009-03-10',
            'school'       => 'Kalayaan High School',
            'password'     => Hash::make('password123'),
            'role'         => 'senior_scout',
            'rank'         => 'Eagle',
            'status'       => 'approved',
        ]);
    }
}