<?php

use Illuminate\Database\Seeder;

class SellerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('seller_levels')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'title' => 'New Seller',

                ),
            1 =>
                array (
                'id' => 2,
                'title' => 'Level 2 Seller',

            ),
            2 =>
                array (
                    'id' => 3,
                    'title' => 'Level 3 Seller',

                ),
            3 =>
                array (
                    'id' => 4,
                    'title' => 'Level 4 Seller',

                )
        ));
    }
}
