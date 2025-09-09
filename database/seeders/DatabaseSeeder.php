<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create one user with a specific email
        User::factory()->create([
            'email' => 'user@gmail.com',
             'password' => bcrypt('1234')
        ]);

        // Create 19 more users, each with 4 posts
        User::factory(19)->hasPosts(4)->create();
    }
}
