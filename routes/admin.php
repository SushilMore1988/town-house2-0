<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
Route::middleware('auth:admin')->group(function(){
	Route::resource('roles','RoleController');
    Route::resource('users','UserRoleController');
	
	Route::post('taxes', 'TaxController@store')->name('taxes.store');
	Route::patch('taxes/udpate/{tax}', 'TaxController@update')->name('taxes.update');
	Route::delete('taxes/destroy/{tax}', 'TaxController@destroy')->name('taxes.destroy');
	
	Route::patch('service-charges/udpate/{serviceCharges}', 'ServiceChargesController@update')->name('service-charges.update');
	
	Route::get('notification', 'NotificationController@index')->name('notification.index');
	Route::get('notification/destroy','NotificationController@destroy')->name('notification.destroy');
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/user', 'UserController@index')->name('user');

	Route::get('/co-work-space/owners', 'CoWorkSpace\CoWorkSpaceController@ownersList')->name('co-work-space.owners');

	Route::get('/user/status/{id}/{status}', 'UserController@changeStatus')->name('user.status');

	Route::get('/co-work-space/packages', 'CoWorkSpace\PackageController@index')->name('co-work-space.packages.index');
	Route::get('/co-work-space/packages/create', 'CoWorkSpace\PackageController@create')->name('co-work-space.packages.create');
	Route::post('/co-work-space/packages/store', 'CoWorkSpace\PackageController@store')->name('co-work-space.packages.store');
	Route::get('/co-work-space/packages/edit/{id}', 'CoWorkSpace\PackageController@edit')->name('co-work-space.packages.edit');
	Route::post('/co-work-space/packages/update/{id}', 'CoWorkSpace\PackageController@update')->name('co-work-space.packages.update');
	Route::post('/co-work-space/packages/destroy/{id}', 'CoWorkSpace\PackageController@destroy')->name('co-work-space.packages.destroy');

	Route::get('/co-work-space', 'CoWorkSpace\CoWorkSpaceController@index')->name('co-work-space');
	Route::get('/co-work-space/status/{id}/{is_approved}', 'CoWorkSpace\CoWorkSpaceController@changeStatus')->name('co-work-space.status');
	Route::get('/co-work-space/admin-status/{id}/{admin_status}', 'CoWorkSpace\CoWorkSpaceController@changeAdminStatus')->name('co-work-space.admin-status');
	Route::get('/co-work-space/rating/{id}/{rating}', 'CoWorkSpace\CoWorkSpaceController@rating')->name('co-work-space.rating');
	Route::get('/co-live-space', 'CoLiveSpaceController@index')->name('co-live-space');
	Route::get('/co-work-space/{id}','CoWorkSpace\CoWorkSpaceController@destroy')->name('co-work-space.destroy');
	Route::get('/co-work-space/master/{id}','CoWorkSpace\MasterController@index')->name('co-work-space.master.index');
	Route::post('/co-work-space/master','CoWorkSpace\MasterController@store')->name('co-work-space.master.store');
	Route::get('/co-work-space/add-review/{id}','CoWorkSpace\ReviewController@index')->name('co-work-space.index');
	// Route::post('/co-work-space/add-review/{id}','CoWorkSpace\ReviewController@store')->name('co-work-space.store');
	Route::get('/user-co-work-spaces/{id}','CoWorkSpace\CoWorkSpaceController@show')->name('user-co-work-spaces');

	Route::get('/terms-and-condition','CoWorkSpace\TermAndConditionController@index')->name('term.condition');

	Route::get('/terms-and-condition-setting','CoWorkSpace\TermAndConditionController@show')->name('term.condition.setting');

	Route::get('/facility','CoWorkSpace\FacilityController@index')->name('facilities');
	Route::post('/facility/store','CoWorkSpace\FacilityController@store')->name('facility.store');
	Route::post('/facility/{id}','CoWorkSpace\FacilityController@update')->name('facility.update');
	Route::get('/listFacilities','CoWorkSpace\FacilityController@show')->name('listFacilities');
	Route::get('/facility/{id}','CoWorkSpace\FacilityController@destroy')->name('facility.destroy');
	Route::get('/facility/edit/{id}','CoWorkSpace\FacilityController@edit')->name('facility.edit');
	Route::post('/rating','CoWorkSpace\RatingController@store')->name('co-work.rating');

	Route::get('/enquiry','CoWorkSpace\EnquiryController@index')->name('enquiry');
	Route::get('/member-ship-enquiry','CoWorkSpace\EnquiryController@memberShipEnquiry')->name('membership-enquiry');
	Route::get('/schedule-tour','CoWorkSpace\EnquiryController@scheduleTour')->name('schedule-tour');

	Route::get('/develop', 'DevelopController@index')->name('develop');
	Route::get('/booking', 'CoWorkSpace\CoWorkSpaceBookingController@index')->name('co-work-space-booking');
	Route::get('/check-booking', 'CoWorkSpace\CoWorkSpaceBookingController@bookingAvailability')->name('check-booking-available');
	Route::post('/change-status', 'CoWorkSpace\CoWorkSpaceBookingController@changeStatus')->name('change-booking-status');

	Route::get('/transaction/listing', 'TransactionController@cwsListingTransaction')->name('transaction.listing');
	Route::get('/transaction/booking', 'TransactionController@cwsBookingTransaction')->name('transaction.booking');

	Route::get('/price-setting', 'PriceSettingController@index')->name('price-setting.index');

	Route::post('/price-setting/store', 'PriceSettingController@store')->name('price-setting.store');

	Route::post('/price-setting/update', 'PriceSettingController@update')->name('price-setting.update');

	Route::get('/price-setting/destroy/{id}', 'PriceSettingController@destroy')->name('price-setting.destroy');

	Route::post('/agreement-upload', 'CoWorkSpace\TermAndConditionController@store')->name('agreement.store');

	Route::post('/terms-condition/update', 'CoWorkSpace\TermAndConditionController@update')->name('terms.condition.update');

	Route::get('/algorithms', 'CoWorkSpace\AlgorithmController@index')->name('algorithms');

	Route::get('/algorithm/edit/{id}', 'CoWorkSpace\AlgorithmController@edit')->name('algorithm.edit');

	Route::post('/algorithm/update/{id}', 'CoWorkSpace\AlgorithmController@update')->name('algorithm.update');

	Route::post('/feedback', 'DevelopController@feedback')->name('feedback');

	Route::get('/promo-codes', 'PromoCodeController@index')->name('promo-codes');
	Route::get('/promo-codes/create', 'PromoCodeController@create')->name('promo-codes.create');
	Route::post('/promo-codes/store', 'PromoCodeController@store')->name('promo-codes.store');
	Route::get('/promo-codes/edit/{promoCode}', 'PromoCodeController@edit')->name('promo-codes.edit');
	Route::put('/promo-codes/update/{promoCode}', 'PromoCodeController@update')->name('promo-codes.update');
	Route::delete('/promo-codes/destroy/{promoCode}', 'PromoCodeController@destroy')->name('promo-codes.destroy');

	Route::get('/co-work-space/destroy/{cws_id}', 'CoWorkSpace\CoWorkSpaceController@destroy')->name('co-work-space.destroy');

	Route::get('/user/verification', 'UserVerificationController@index')->name('user.verification');

	Route::get('/user/verify/{status}/{id}/{type}', 'UserVerificationController@changeStatus')->name('user.verification.store');

	/* About blog route start*/

	Route::get('/blogspot', 'AboutBlogSpotController@index')->name('about.blogspot');
	Route::get('/blogspot/create', 'AboutBlogSpotController@create')->name('about.blogspot.create');
	Route::post('/blogspot/store', 'AboutBlogSpotController@store')->name('about.blogspot.store');
	Route::get('/blogspot/edit/{id}', 'AboutBlogSpotController@edit')->name('about.blogspot.edit');
	Route::post('/blogspot/update/{id}', 'AboutBlogSpotController@update')->name('about.blogspot.update');
	Route::post('/blogspot/destroy/{id}', 'AboutBlogSpotController@destroy')->name('about.blogspot.destroy');
	/* About blog route end*/

	/* About team route start*/

	Route::get('/team', 'AboutTeamController@index')->name('about.team');
	Route::get('/team/create', 'AboutTeamController@create')->name('about.team.create');
	Route::post('/team/store', 'AboutTeamController@store')->name('about.team.store');
	Route::get('/team/edit/{id}', 'AboutTeamController@edit')->name('about.team.edit');
	Route::post('/team/update/{id}', 'AboutTeamController@update')->name('about.team.update');
	Route::post('/team/destroy/{id}', 'AboutTeamController@destroy')->name('about.team.destroy');
	/* About team route end*/

	/* About story route start*/

	Route::get('/story', 'AboutStoryController@index')->name('about.story');
	Route::get('/story/create', 'AboutStoryController@create')->name('about.story.create');
	Route::post('/story/store', 'AboutStoryController@store')->name('about.story.store');
	Route::get('/story/edit/{id}', 'AboutStoryController@edit')->name('about.story.edit');
	Route::post('/story/update/{id}', 'AboutStoryController@update')->name('about.story.update');
	Route::post('/story/destroy/{id}', 'AboutStoryController@destroy')->name('about.story.destroy');
	/* About story route end*/

	/* About terms route start*/

	Route::get('/terms', 'AboutTermsAndConditionController@index')->name('about.terms');
	Route::get('/terms/create', 'AboutTermsAndConditionController@create')->name('about.term.create');
	Route::post('/terms/store', 'AboutTermsAndConditionController@store')->name('about.term.store');
	Route::get('/terms/edit/{id}', 'AboutTermsAndConditionController@edit')->name('about.term.edit');
	Route::post('/terms/update/{id}', 'AboutTermsAndConditionController@update')->name('about.term.update');
	Route::post('/terms/destroy/{id}', 'AboutTermsAndConditionController@destroy')->name('about.term.destroy');
	/* About terms route end*/

	Route::get('/professional-interests', 'ProfessionalInterestController@index')->name('professional-interests');
	Route::post('/professional-interests/store', 'ProfessionalInterestController@store')->name('professional-interests.store');
	Route::post('/professional-interests/update', 'ProfessionalInterestController@update')->name('professional-interests.update');

	Route::get('/social-interests', 'SocialInterestController@index')->name('social-interests');
	Route::post('/social-interests/store', 'SocialInterestController@store')->name('social-interests.store');
	Route::post('/social-interests/update', 'SocialInterestController@update')->name('social-interests.update');

	Route::get('/amenity-category', 'AmenityCategoryController@index')->name('amenity-category');
	Route::get('/amenity-category/create', 'AmenityCategoryController@create')->name('amenity-category.create');
	Route::post('/amenity-category/store', 'AmenityCategoryController@store')->name('amenity-category.store');
	Route::get('/amenity-category/edit/{clsAmenityCategory}', 'AmenityCategoryController@edit')->name('amenity-category.edit');
	Route::put('/amenity-category/update/{clsAmenityCategory}', 'AmenityCategoryController@update')->name('amenity-category.update');
	Route::delete('/amenity-category/destroy/{clsAmenityCategory}', 'AmenityCategoryController@destroy')->name('amenity-category.destroy');

	Route::get('/amenities', 'AmenityController@index')->name('amenities');
	Route::get('/amenities/create', 'AmenityController@create')->name('amenities.create');
	Route::post('/amenities/store', 'AmenityController@store')->name('amenities.store');
	Route::get('/amenities/edit/{clsAmenityValue}', 'AmenityController@edit')->name('amenities.edit');
	Route::put('/amenities/update/{clsAmenityValue}', 'AmenityController@update')->name('amenities.update');
	Route::delete('/amenities/destroy/{clsAmenityValue}', 'AmenityController@destroy')->name('amenities.destroy');
});