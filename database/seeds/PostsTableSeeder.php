<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for ($i=0; $i < 500 ; $i++) { 
            $title=$faker->text($maxNbChars = 40);
        DB::table('posts')->insert([
        	'cate_id'=>rand(1 ,25),
        	'create_by'=>rand(1 ,10),
        	'title'=> "$title",
        	'summary'=>$faker->text($maxNbChars = 100),
        	'content' =>$faker->text($maxNbChars = 4000),
            'images' =>'default.png',
            'option'=>rand(1,2),
            'status' =>rand(1, 3),
        	'views' =>rand(1 ,100000),
            'slug' => str_slug("$title",'-'),

        ]);
    }
    }
}
