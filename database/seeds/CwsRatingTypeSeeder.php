<?php

use Illuminate\Database\Seeder;

class CwsRatingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cws_rating_types')->insert(
            array([
                'id' => 1,
                'type'=>'Desk Quality',
            ],
            [
                'id' => 2,
                'type'=>'Facilities',
            ],
            [
                'id' => 3,
                'type'=>'Work Comfort',
            ],
            [
                'id' => 4,
                'type'=>'Ambience',
            ],
            [
                'id' => 5,
                'type'=>'Cleanliness',
            ],
             [
                'id' => 6,
                'type'=>'Surrounding',
            ],
            ));
    }
}
