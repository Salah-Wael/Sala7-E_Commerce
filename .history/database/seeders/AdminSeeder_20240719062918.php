<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(1)->adminAccount()->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'gender' => fake()->randomElement(['male', 'female']),
            'password' => Hash::make('password'),
            'birthDate' => fake()->date(),
            'remember_token' => Str::random(10),

        ]);
    }
}
