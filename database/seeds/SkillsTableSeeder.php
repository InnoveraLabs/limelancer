<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('skills')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'skills_name' => 'Web Development',

                ),
            1 =>
                array (
                    'id' => 2,
                    'skills_name' => 'PHP',

                ),
            2 =>
                array (
                    'id' => 3,
                    'skills_name' => 'Javascript',

                ),
            3 =>
                array (
                    'id' => 4,
                    'skills_name' => 'Web Scrapping',

                ),
            4 =>
                array (
                    'id' => 5,
                    'skills_name' => 'HTML',

                ),
            5 =>
                array (
                    'id' => 6,
                    'skills_name' => 'CSS',

                ),
            6 =>
                array (
                    'id' => 7,
                    'skills_name' => 'Laravel Developer',

                ),
            7 =>
                array (
                    'id' => 8,
                    'skills_name' => 'Vue Js',

                ),
            8 =>
                array (
                    'id' => 9,
                    'skills_name' => 'Jquery',

                ),
            9 =>
                array (
                    'id' => 10,
                    'skills_name' => 'Livewire',

                )
        ));
    }
}
