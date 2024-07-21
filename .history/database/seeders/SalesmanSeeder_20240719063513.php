<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(3)->salesmanAccount()->create();
        User::factory()->adminAccount()->create(
            [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'gender' => 'male',
            'password' => Hash::make(123456),
            'birthDate' => fake()->date(),
            'remember_token' => Str::random(10),
            ]
    );
    }
}
