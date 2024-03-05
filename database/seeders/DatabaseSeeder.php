<?php
// database\DatabaseSeeder.php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PostsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
            $this->call(PostsTableSeeder::class);
            
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'asd@asd.com',
                'password' => bcrypt(123)
            ]);
    }
}
