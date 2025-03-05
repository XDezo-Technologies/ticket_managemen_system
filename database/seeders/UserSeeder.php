<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name' => 'Admin',
            'phone' => '9876543210',
            'address' => '123 Admin Street',
            'profile_picture' => 'admin.jpg',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        //support_staff
        User::create([
            'name' => 'support_staff',
            'phone' => '9876543200',
            'address' => '123 staff Street',
            'profile_picture' => 'staff.jpg',
            'email' => 'staff@gmail.com',
            'role' => 'support_staff',
            'password' => Hash::make('staff123'),
        ]);
        //customer
        User::create([
            'name' => 'customer',
            'phone' => '9876500000',
            'address' => '123 customer Street',
            'profile_picture' => 'customer.jpg',
            'email' => 'customer@gmail.com',
            'role' => 'user',
            'password' => Hash::make('customer123'),
        ]);
    }
}
