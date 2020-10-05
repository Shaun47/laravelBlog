<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset table
        DB::table('posts')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //create 10 posts
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2020,9,1,9);

        for($i = 1; $i <= 10; $i++){
            $image = "post_image_".rand(1,5).".jpg";
            // $date = date("Y-m-d H:i:s", strtotime("2016-07-08 08:00:00 +{$i} days"));
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);


            $posts[] = [
                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(8,12)),
                'excerpt' => $faker->text(rand(250,300)),
                'body' => $faker->paragraphs(rand(10,15),true),
                'slug' => $faker->slug(),
                'image' => $image,
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'view_count' => rand(1,10)*10,
                'published_at' => $i<5?$publishedDate:(rand(0,1) == 0 ? NULL:$publishedDate->addDays(4)), 
            ];
        }

        //inserting data
        DB::table('posts')->insert($posts);

    }
}
