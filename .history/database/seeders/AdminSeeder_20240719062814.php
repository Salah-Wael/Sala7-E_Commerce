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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'gender' => fake()->randomElement(['male', 'female']),
            'password' => static::$password ??= Hash::make('password'),
            'birthDate' => fake()->date(),
            'remember_token' => Str::random(10),
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
