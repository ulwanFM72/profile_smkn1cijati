<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@smkn1cijati.sch.id',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
