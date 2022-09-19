<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Design',
                    'slug' => 'design',

                ),
                1 =>
                array (
                    'id' => 2,
                    'name' => 'Development',
                    'slug' => 'development',

                ),
                2 =>
                array (
                    'id' => 3,
                    'name' => 'Marketing',
                    'slug' => 'marketing',

                ),
                3 =>
                 array (
                     'id' => 4,
                     'name' => 'Contents',
                     'slug' => 'contents',

                 ),
                4 =>
                array (
                    'id' => 5,
                    'name' => 'Audio & Music',
                    'slug' => 'audio&music',

                ),
                5 =>
                array (
                    'id' => 6,
                    'name' => 'Video & Animation',
                    'slug' => 'video&animation',

                ),
                6 =>
                array (
                    'id' => 7,
                    'name' => 'Social Media',
                    'slug' => 'social-media',

                ),
                7 =>
                 array (
                     'id' => 8,
                     'name' => 'Business Administration',
                     'slug' => 'business-administration',

                 ),
                8 =>
                array (
                 'id' => 9,
                 'name' => 'Mobile & Apps',
                 'slug' => 'mobile-&-apps',

                ),

        ));
    }
}
