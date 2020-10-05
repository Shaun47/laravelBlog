<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //reset the table
        DB::table('users')->truncate();


        //generate 3 users
        DB::table('users')->insert([
            [
                'name' => "John Doe",
                'slug' => "jhon-doe",
                'email' => "johndoe@test.com",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Jane Doe",
                'slug' => "jane-doe",
                'email' => "janedoe@test.com",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Johnny Doe",
                'slug' => "jhonny-doe",
                'email' => "johnnydoe@test.com",
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
