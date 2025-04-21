<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'sex' => 'Male',
            'birthday' => '1979-01-01',
            'email' => 'admin@itelec3.test',
            'password' => Hash::make('admin123'), // You can change this
            'user_type' => 'Admin',
        ]);

        User::create([
            'first_name' => 'Sheena',
            'last_name' => 'Doe',
            'sex' => 'Female',
            'birthday' => '1996-04-27',
            'email' => 'sheena_doe@itelec3.test',
            'password' => Hash::make('sheena123'), // You can change this
            'user_type' => 'Customer',
        ]);
    }
}
