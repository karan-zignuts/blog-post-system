<?php

// database\PostsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
             DB::table('posts')->insert([
                 'title' => 'hello',
                 'content' => 'this is 1st seeder',
             ]);
    }
}


