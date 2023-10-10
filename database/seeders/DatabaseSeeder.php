<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\DB;


function disableForiegnKey(){
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
}

function enableForiegnKey(){
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
}


function truncate(){
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
        truncate();
         disableForiegnKey();
       User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mubarak Admin',
            'email' => 'mubaraklouis@gmail.com',
            'password' =>bcrypt('Louis1234')
        ]);

        enableForiegnKey();



    }
}
