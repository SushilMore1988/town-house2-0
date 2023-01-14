<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| co-work space Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',	'HomeController@index')->name('index');

Route::middleware('auth')->group(function(){
	Route::get('set-name', 'CoWorkSpaceController@setName');
	Route::get('/select-type', 'ListCoWorkSpaceController@selectType')->name('select-type');

	Route::get('/create','CoWorkSpaceController@create')->name('create');

	Route::post('/store', 'CoWorkSpaceController@store')->name('store');

	Route::get('/email-otp/{email}', 'VerificationController@sendEmailOtp')->name('email-otp');

	Route::post('/email/verify', 'VerificationController@verifyEmail')->name('email.verify');

	Route::get('/edit/{slug}', 'CoWorkSpaceController@edit')->name('edit');
	
	Route::get('/upgrade-package/{slug}', 'CoWorkSpaceController@upgradePackage')->name('upgrade-package');
	
	Route::put('/update/{cws}', 'CoWorkSpaceController@update')->name('update');

	Route::post('/facilities/{cws}', 'FacilityController@store')->name('facility.store');

	Route::post('/location/{cws}', 'LocationController@store')->name('location.store');

	Route::post('/opening-hours/{cws}','OpeningHoursController@store')->name('opening-hours.store');

	Route::post('/size/{cws}','SizeController@store')->name('size.store');

	Route::post('/terms-condition','TermsAndConditionController@store')->name('term.condition.store');

	Route::post('/price/{cws}','PriceController@store')->name('price.store');

	Route::post('/banner/{cws}','BannerController@store')->name('banner.store');

	Route::post('/cover/{cws}','CoverController@store')->name('cover.store');

	Route::post('/images/{cws}', 'ImageController@store')->name('image.store');

	Route::post('/desk/images/{cws}', 'DeskPhotoController@store')->name('desk.image.store');

	Route::post('/private-office/images/{cws}', 'PrivateOfficePhotoController@store')->name('private-office.image.store');

	Route::post('/meeting-room/images/{cws}', 'MeetingRoomPhotoController@store')->name('meeting-room.image.store');

	Route::get('/ajax-private-office-detail/{id}/{office_id}', 'PriceController@ajax_get_private_office_detail');
	Route::get('/ajax-meeting-room-detail/{id}/{room_id}','PriceController@ajax_get_meeting_room_detail');

	Route::post('/rating','RatingCoWorkSpaceController@store')->name('rating');

	Route::post('/ajax-like/{id}','Explore\ExploreController@ajax_like');

	Route::post('/ajax-dislike/{id}','Explore\ExploreController@ajax_dislike');

	Route::post('/booking','Explore\BookingController@store')->name('booking');

	Route::get('/booking-order/{cwsBooking}','Explore\BookingController@show')->name('booking-order');

	Route::post('/check-availability','Explore\BookingController@checkAvailability')->name('check-availability');

	Route::post('/availability-success','Explore\ExploreController@availabilitySuccess')->name('availability-success');


	// Route::post('payment', 'PaymentController@payment')->name('payment');
	Route::post('payment', 'PaypalPaymentController@payment')->name('payment');
	
	Route::get('payment/cancel', 'PaypalPaymentController@paymentCanceled')->name('payment.cancel');
	
	Route::get('payment/status', 'PaypalPaymentController@paymentStatus')->name('payment.status');

	// Route::post('payu/payment', 'PaypalPaymentController@payment')->name('payment');
	// Route::post('payu/payment', 'PayuPaymentController@payment')->name('payment');

	// Route::get('payuPayment/status', 'Explore\BookingController@status')->name('payu.payment.status');
	Route::get('payuPayment/status', 'PaypalPaymentController@status')->name('payu.payment.status');

	Route::post('listing-payment', 'ListingPaymentController@payment')->name('listing-payment');

	# Status Route
	//Route::get('listing-payment/status', 'ListingPaymentController@status')->name('listing-payment.status');

	// Route::post('listing-paypal-payment', 'ListingPaypalPaymentController@payment')->name('listing-paypal-payment');

	// Route::get('listing-paypal-payment-status', 'ListingPaypalPaymentController@paymentStatus')->name('listing-paypal-payment-status');
	
	// Route::get('listing-paypal-payment-canceled', 'ListingPaypalPaymentController@paymentCanceled')->name('listing-paypal-payment-canceled');
});

Route::post('/send-enquiry', 'Explore\EnquiryController@store')->name('sendEnquiry');

Route::post('/send-member-ship-enquiry', 'Explore\MemberShipEnquiryController@store')->name('memberShipEnquiry');

Route::post('/schedule-tour', 'Explore\ScheduleTourController@store')->name('scheduleTour');

Route::get('/ajax-get-coWorkSpace-detail/{id}','Browsing\BrowseCoWorkSpaceController@ajaxGetCoWorkSpaceDetail')->name('ajax-get-coWorkSpace-detail');

/**
 * Keep this route at the bottom 
 */
Route::get('/{viewType}', 'Browsing\BrowseCoWorkSpaceController@index')->name('list');
