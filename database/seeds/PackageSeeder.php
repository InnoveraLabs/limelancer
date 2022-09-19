<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('packages')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Basic',
                
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Standard',
                
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Premium',
            )

        ));
    }
}
