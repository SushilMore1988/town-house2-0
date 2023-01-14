<?php

use Illuminate\Database\Seeder;

class CwsFacilityCatergoryValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cws_facility_category_values')->insert(
            array([
                'id' => 1,
                'cws_facility_category_id'=>1,
                'value' => 'Wifi'
            ],
            [
                'id' => 2,
                'cws_facility_category_id'=>1,
                'value' => 'Air Conditioning'
            ],
            [
                'id' => 3,
                'cws_facility_category_id'=>1,
                'value' => 'Heating'
            ],
            [
                'id' => 4,
                'cws_facility_category_id'=>2,
                'value' => 'Standing Desks'
            ],
            [
                'id' => 5,
                'cws_facility_category_id'=>2,
                'value' => 'Bean Bags'
                
            ],
             [
                'id' => 6,
                'cws_facility_category_id'=>2,
                'value' => 'Ergonomic Chairs'
                
            ],
            [
                'id' => 7,
                'cws_facility_category_id'=>2,
                'value' => 'Hammock'
                
            ],
            [
                'id' => 8,
                'cws_facility_category_id'=>2,
                'value' => 'Others'
                
            ],
         	[
                'id' => 9,
                'cws_facility_category_id'=>3,
                'value' => 'Events'
                
            ],
        	[
                'id' => 10,
                'cws_facility_category_id'=>3,
                'value' => 'Workshops'
                
            ],
        	 [
                'id' => 11,
                'cws_facility_category_id'=>3,
                'value' => 'Community Lunches '
                
            ],
        	[
                'id' => 12,
                'cws_facility_category_id'=>3,
                'value' => 'Mentorship Programs'
                
            ],
        	[
                'id' => 13,
                'cws_facility_category_id'=>3,
                'value' => 'Pitching Events'
                
            ],
        	[
                'id' => 14,
                'cws_facility_category_id'=>3,
                'value' => 'Accelerator Programs'
                
            ],
        	[
                'id' => 15,
                'cws_facility_category_id'=>3,
                'value' => 'Facebook Group'
                
            ],
        	[
                'id' => 16,
                'cws_facility_category_id'=>3,
                'value' => 'Toastmaster'
                
            ],
        	[
                'id' => 17,
                'cws_facility_category_id'=>3,
                'value' => 'Incubator Programs'
                
            ],
        	[
                'id' => 18,
                'cws_facility_category_id'=>3,
                'value' => 'Community App'
                
            ],
        	[
        	    'id' => 19,
                'cws_facility_category_id'=>3,
                'value' => 'Outbound Events'
                
            ],
        	[
        	    'id' => 20,
                'cws_facility_category_id'=>3,
                'value' => 'Others'
                
            ],
        	[
        	    'id' => 21,
                'cws_facility_category_id'=>4,
                'value' => 'Outdoor Terraces'
                
            ],
        	[
        	    'id' => 22,
                'cws_facility_category_id'=>4,
                'value' => 'Swimming Pool'
                
            ],
        	[
        	    'id' => 23,
                'cws_facility_category_id'=>4,
                'value' => 'Nap Room'
                
            ],
        	[
        	    'id' => 24,
                'cws_facility_category_id'=>4,
                'value' => 'Yoga Studio'
                
            ],
        	[
        	    'id' => 25,
                'cws_facility_category_id'=>4,
                'value' => 'Lounge/ Chill-Out Area'
                
            ],
        	[
        	    'id' => 26,
                'cws_facility_category_id'=>4,
                'name' => 'Others'
                
            ],
        	[
        	    'id' => 27,
                'cws_facility_category_id'=>5,
                'value'=> 'Kitchen'
                
            ],
        	[
        	    'id' => 28,
                'cws_facility_category_id'=>5,
                'value'=> 'Skype Room'
                
            ],
        	[
        	    'id' => 29,
                'cws_facility_category_id'=>5,
                'value'=> 'Podcasting Room'
                
            ],
        	[
        	    'id' => 30,
                'cws_facility_category_id'=>5,
                'value'=>  'Printer'
                
            ],
        	[
        	    'id' => 31,
                'cws_facility_category_id'=>5,
                'value'=>  'Personal Lockers'
                
            ],
        	[
        	    'id' => 32,
                'cws_facility_category_id'=>5,
                'value'=>  'Event Space for Rent'
                
            ],
        	[
        	    'id' => 33,
                'cws_facility_category_id'=>5,
                'value'=>  'Nearby Accomodation'
                
            ],
        	[
        	    'id' => 34,
                'cws_facility_category_id'=>5,
                'value'=>  'Others'
                
            ],
        	[
        	    'id' => 35,
                'cws_facility_category_id'=>6,
                'value'=>  'Pool Table'
                
            ],
        	[
        	    'id' => 36,
                'cws_facility_category_id'=>6,
                'value'=>  'Football'
                
            ],
        	[
        	    'id' => 37,
                'cws_facility_category_id'=>6,
                'value'=>  'Mini Golf Course'
                
            ],
        [
        	    'id' => 38,
                'cws_facility_category_id'=>6,
                'value'=>  'Trampoline'
                
            ],
        	[
        	    'id' => 39,
                'cws_facility_category_id'=>6,
                'value'=>  'Library'
                
            ],
        	[
        	    'id' => 40,
                'cws_facility_category_id'=>6,
                'value'=>  'Dog-Friendly'
                
            ],
        	[
        	    'id' => 41,
                'cws_facility_category_id'=>6,
                'value' => 'Cat-Friendly'
                
            ],
        	[
        	    'id' => 42,
                'cws_facility_category_id'=>6,
                'value' => 'Board Games'
                
            ],
        	[
        	    'id' => 43,
                'cws_facility_category_id'=>6,
                'value' => 'Gym'
                
            ],
        	[
        	    'id' => 44,
                'cws_facility_category_id'=>6,
                'value' => 'Art Gallery'
                
            ],
        	[
        	    'id' => 45,
                'cws_facility_category_id'=>6,
                'value' => 'Darts'
                
            ],
        	[
        	    'id' => 46,
                'cws_facility_category_id'=>6,
                'value' => 'Karaokes'
                
            ],
        	[
        	    'id' => 47,
                'cws_facility_category_id'=>6,
                'value' => 'Arcade Games'
                
            ],
        	[
        	    'id' => 48,
                'cws_facility_category_id'=>6,
                'value' => 'PS/ XBOX Gaming Room'
                
            ],
        	[
        	    'id' => 49,
                'cws_facility_category_id'=>6,
                'value' => 'Others'
                
            ],
        	[
        	    'id' => 50,
                'cws_facility_category_id'=>7,
                'value' => 'Free Parking on Premise'
                
            ],
        	[
        	    'id' => 51,
                'cws_facility_category_id'=>7,
                'value' => 'Bike Parking'
                
            ],
        	[
        	    'id' => 52,
                'cws_facility_category_id'=>7,
                'value' => 'Closed to public transport'
                
            ],
        	[
        	    'id' => 53,
                'cws_facility_category_id'=>7,
                'value' => 'MotorBike Storage'
                
            ],
        	
        	[
        	    'id' => 54,
                'cws_facility_category_id'=>7,
                'value' => 'Car Share'
                
            ],
        	[
        	    'id' => 55,
                'cws_facility_category_id'=>7,
                'value' => 'Others'
                
            ],
        
        	[
        	    'id' => 56,
                'cws_facility_category_id'=>8,
                'value' => 'Free Drinking Water'
                
            ],
            [
                'id' => 57,
                'cws_facility_category_id'=>8,
                'value' => 'Tea or Coffee'
                
            ],
        	[
        	    'id' => 58,
                'cws_facility_category_id'=>8,
                'value' => 'Free Beer'
                
            ],
        	[
        	    'id' => 59,
                'cws_facility_category_id'=>8,
                'value' => 'Alcohol Av. for Purchase'
                
            ],
        	[
        	    'id' => 60,
                'cws_facility_category_id'=>8,
                'value' => 'Free Snacks'
                
            ],
        	[
        	    'id' => 61,
                'cws_facility_category_id'=>8,
                'value' => 'Catering Kitchen'
                
            ],
        	[
        	    'id' => 62,
                'cws_facility_category_id'=>8,
                'value' => 'Onsite Restaurant'
                
            ],
        	[
        	    'id' => 63,
                'cws_facility_category_id'=>8,
                'value' => 'Others'
                
            ],));
    }
}
