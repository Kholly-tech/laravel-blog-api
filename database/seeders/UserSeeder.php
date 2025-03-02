<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(25)
            ->hasBlogs(10)
            ->create();

        User::factory()
            ->count(100)
            ->hasBlogs(5)
            ->create();

        User::factory()
            ->count(100)
            ->hasBlogs(3)
            ->create();
            
        User::factory()
            ->count(5)
            ->create();
    }
}
