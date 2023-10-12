<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \Database\Seeders\Traits\CheckForiegnkey;
use Illuminate\Support\Facades\DB;


function disableForiegnKey()
{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
}

function enableForiegnKey()
{
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
}


function delete_db()
{
    DB::table('users')->truncate();
}



class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /*
        *truncateTable() : this function truncates the table before new seeding
        *disableForiengKey() : this function disables foriengn keys checks
        *enableForiengKey() :this function enables foreign key checks
        **/
      disableForiegnKey();
        delete_db();

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mubarak Admin',
            'email' => 'mubaraklouis@gmail.com',
            'password' => bcrypt('Louis1234')
        ]);

        Comment::factory(3)->create();
        Post::factory(10)->create();



      enableForiegnKey();
    }
}
