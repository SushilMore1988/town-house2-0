<?php

use Illuminate\Database\Seeder;

class CwsFacilityCatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cws_facility_categories')->insert(
            array([
                'id' => 1,
                'name' => 'General Information'
            ],
            [
                'id' => 2,
                'name' => 'Seating'
            ],
            [
                'id' => 3,
                'name' => 'Community'
            ],
            [
                'id' => 4,
                'name' => 'Relax Zones'
            ],
            [
                'id' => 5,
                'name' => 'Facilities'
            ],
            [
                'id' => 6,
                'name' => 'Entertainment'
            ],
            [
                'id' => 7,
                'name' => 'Transportation'
            ],
            [
                'id' => 8,
                'name' => 'Catering'
            ]));
    }
}
