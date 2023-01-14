<?php

use App\Http\Controllers\Front\CoWorkSpace\RazorpayPaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

/**
 * Community index and th-network related routes START
 */

Route::get('/th-networks', 'THNetworkController@index')->name('th-network.index');

Route::get('/th-network/create', 'THNetworkController@create')->name('th-network.create');

Route::post('/th-network/community-index', 'THNetworkController@show')->name('th-network.show');

Route::get('/th-networks/group/{slug}', 'THNetworkController@showGroup')->name('th-network.show-group');

// Route::get('/community', 'CommunityController@index')->name('community.index');

/**
 * Community index and th-network related routes END
 */

// Route::get('/community-index', function () {
//     return view('front.colive.network.community-index');
// })->name('community-index');

// Authentication Routes...
Route::get('login', 	'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 	'Auth\LoginController@login');

Route::post('logout', 	'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/th2-0', 'TownHouseController@index')->name('th2.0');

Route::get('/co-live',	'CoLiveSpace\HomeController@index')->name('co-live');

Route::get('/develop', 'DevelopController@index')->name('develop');

Route::get('/privacy-policy', function(){
	return view('front.privacy-policy');
});
Route::get('/terms-and-conditions', function(){
	return view('front.terms-and-conditions');
});

Route::post('/select-type','HomeController@homeSelectType')->name('select-type');

Route::get('/list-co-live', 'CoLiveSpace\CoLiveSpaceController@colivefrom')->name('list-colive-space');

Route::post('/contact/store', 	'ContactController@store'	)->name('contact.store');

Route::get('/dashboard','CoWorkSpace\DashboardController@index')->name('front.dashboard.index');

Route::get('/create/property', 	'DevelopController@create')->name('property.create');
Route::post('/create/property', 'DevelopController@store'	)->name('property.store');

Route::get('/ajax-upload-develop-your-property-images', 'Front\DevelopController@ajaxUploadDevelopYourPropertyImages')->name('ajax-upload-develop-your-propery-images');
Route::get('/ajax-delete-develop-your-property-images', 'Front\DevelopController@ajaxDeleteDevelopYourPropertyImages')->name('ajax-delete-develop-your-propery-images');

// Route::get('/list-your-space-type', 'CoWorkSpace\ListCoWorkSpaceController@listYourSpaceType')->name('front.list-your-space-type');
Route::get('/co-work-space/ajax-state/{id}','CoWorkSpace\ListCoWorkSpaceController@ajaxStates')->name('front.ajax-state');
Route::get('/co-work-space/ajax-city/{id}','CoWorkSpace\ListCoWorkSpaceController@ajaxCities')->name('front.ajax-city');
Route::get('/co-work-space/ajax-country','CoWorkSpace\ListCoWorkSpaceController@ajaxCountry')->name('front.ajax-country');
Route::get('/co-work-space/ajax-country-city/{id}','CoWorkSpace\ListCoWorkSpaceController@ajaxGetCitiesByCountry')->name('front.ajax-country-city');

/*LocationCoWorkSpaceController's route */
Route::post('/getlocation',	'CoWorkSpace\LocationCoWorkSpaceController@edit');

/*PriceCoWorkSpaceController's route */
Route::post('/ajax-upload-co-work-images',		'CoWorkSpace\PhotoCoWorkSpaceController@store'			)->name('ajax-upload-co-work-images');
Route::post('/ajax-upload-cowork-cover-image',	'CoWorkSpace\PhotoCoWorkSpaceController@storeCoverImage')->name('ajax-upload-cowork-cover-image');
Route::post('ajax-delete-cowork-image',			'CoWorkSpace\PhotoCoWorkSpaceController@destroy'		)->name('ajax-delete-cowork-image');
Route::post('ajax-delete-cowork-banner',		'CoWorkSpace\PhotoCoWorkSpaceController@destroy'		)->name('ajax-delete-cowork-banner');
Route::post('/photo',							'CoWorkSpace\PhotoCoWorkSpaceController@edit');

/*PackageCoWorkSpaceController's route*/
Route::post('/package','CoWorkSpace\PackageCoWorkSpaceController@store')->name('co-work.package');

/*PriceCoWorkSpaceController's route*/
Route::post('/price','CoWorkSpace\PriceCoWorkSpaceController@store')->name('co-work.price');
Route::get('/co-work-space/ajax-private-office-detail/{id}','CoWorkSpace\PriceCoWorkSpaceController@ajax_get_private_office_detail');
Route::get('/ajax-meeting-room-detail/{id}','CoWorkSpace\PriceCoWorkSpaceController@ajax_get_meeting_room_detail');

Route::post('show-subscription', ['uses' => 'CoWorkSpace\ListingPaymentController@showPayment'])->name('co-work-space.show-subscription');
Route::post('listing-payment', ['uses' => 'CoWorkSpace\ListingPaymentController@payment'])->name('co-work-space.listing-paypal-payment');
Route::post('listing-payment/razorpay', ['uses' => 'CoWorkSpace\ListingPaymentController@storeRazorpay'])->name('co-work-space.listing-razor-payment');
Route::get('listing-payment/status/{cwsListingPayment}', ['uses' => 'CoWorkSpace\ListingPaymentController@status'])->name('co-work-space.listing-payment.status');
//Paypal Routes
Route::get('listing-payment/paypal-status', ['uses' => 'CoWorkSpace\ListingPaymentController@paypalStatus'])->name('co-work-space.listing-payment.paypal-status');
Route::get('listing-payment/paypal-cancel/{cwsListingPayment}', ['uses' => 'CoWorkSpace\ListingPaymentController@paypalCancel'])->name('co-work-space.listing-payment.paypal-cancel');
Route::get('listing-payment/paypal-failed/{cwsListingPayment}', ['uses' => 'CoWorkSpace\ListingPaymentController@paypalFailed'])->name('co-work-space.listing-payment.paypal-failed');

Route::get('/explore/{slug}','CoWorkSpace\Explore\ExploreController@index')->name('front.explore');

/*PhotoCoWorkSpaceController's route */
Route::post('/ajax-upload-co-work-images','CoWorkSpace\PhotoCoWorkSpaceController@store')->name('ajax-upload-co-work-images');
Route::post('/ajax-upload-cowork-cover-image', 'CoWorkSpace\PhotoCoWorkSpaceController@storeCoverImage')->name('ajax-upload-cowork-cover-image');
Route::post('ajax-delete-cowork-image',	'CoWorkSpace\PhotoCoWorkSpaceController@destroy')->name('ajax-delete-cowork-image');
Route::post('ajax-delete-cowork-banner', 'CoWorkSpace\PhotoCoWorkSpaceController@destroy')->name('ajax-delete-cowork-banner');
Route::post('/photo', 'CoWorkSpace\PhotoCoWorkSpaceController@edit');

/*CoWorkSpaceController's route*/
Route::post('/change-status/{id}', 'CoWorkSpace\CoWorkSpaceController@changeStatus')->name('co-work.change.status');
Route::get('/co-work-space/delete/{id}', 'CoWorkSpace\CoWorkSpaceController@destroy')->name('delete');

/*RatingCoWorkSpaceController's route .View =>'front->cowork->explore->index' */
Route::post('/rating','CoWorkSpace\RatingCoWorkSpaceController@store')->name('co-work.rating');

/*ExploreController's route*/
// Route::get('/explore/{slug}','CoWorkSpace\Explore\ExploreController@index')->name('explore');

Route::post('/booking','CoWorkSpace\Explore\BookingController@store')->name('booking');

Route::get('/booking-review/{id}','CoWorkSpace\Explore\BookingController@bookingReview')->name('booking-review');

Route::get('/rebooking-review/{id}','CoWorkSpace\Explore\BookingController@reBookingReview')->name('rebooking-review');

Route::post('/send-enquiry', 'CoWorkSpace\Explore\EnquiryController@store')->name('co-work.sendEnquiry');
Route::post('/send-member-ship-enquiry', 'CoWorkSpace\Explore\MemberShipEnquiryController@store')->name('co-work.memberShipEnquiry');
Route::post('/schedule-tour', 'CoWorkSpace\Explore\ScheduleTourController@store')->name('co-work.scheduleTour');

Route::get('/list-view/shared-desk-filter','CoWorkSpace\Browsing\SharedDeskFilterController@sharedDeskFilter')->name('sharedDeskFilter');
Route::get('/list-view/shared-high-to-low','CoWorkSpace\Browsing\SharedDeskFilterController@sharedDeskFilterHighToLow')->name('sharedDeskFilterHighToLow');

Route::get('/list-view/shared-low-to-high','CoWorkSpace\Browsing\SharedDeskFilterController@sharedDeskFilterLowToHigh')->name('sharedDeskFilterLowToHigh');

Route::get('/apply-code/{code}', 'PromoCodeController@show');

Route::post('/selfie', 'ProfileController@selfieImage')->name('selfie.image');
Route::post('/profile-photo', 'ProfileController@profileImage')->name('profile.image');
Route::post('/government-id', 'ProfileController@governmentId')->name('government.id');
Route::post('/delete-government-id', 'ProfileController@ajaxDeleteGovernmentId')->name('ajax.delete.government.id');
Route::post('/delete-photo-id', 'ProfileController@ajaxDeletePhotoId')->name('ajax.delete.photo.id');

Route::get('/email-otp/{email}', 'VerificationController@sendEmailOtp')->name('email-otp');

Route::post('/email/verify', 'VerificationController@verifyEmail')->name('email.verify');

Route::get('/phone-otp/{phone}', 'VerificationController@sendPhoneOtp')->name('phone-otp');

Route::post('/phone/verify', 'VerificationController@verifyPhone')->name('phone.verify');

Route::get('/profile', 'SettingController@index')->name('setting.index');

Route::post('/change-password', 'SettingController@changePassword')->name('password.change');

Route::post('/set-location', 'HomeController@setLocation')->name('set.location');

Route::get('/set-images', 'HomeController@setImages')->name('set.images');

Route::post('/update-profile', 'SettingController@updateProfile')->name('update.profile');

Route::get('/user/email-otp/{email}', 'SettingController@sendEmailOtp')->name('user.email-otp');

Route::post('/user/email/verify', 'SettingController@verifyEmail')->name('user.email.verify');



Route::middleware('auth')->group(function(){
    Route::get('/personalise', 'PersonaliseController@create')->name('personalise.create');
});

Route::get('/listing-invoice-pdf', function(){
    $mail_array = array();
    $mail_array['name'] = 'Sushil More';
    $mail_array['email'] = 'sushilm35@gmail.com';

    Mail::send(['html'=>'email.listing-invoice'], $mail_array, function($message) use($mail_array){
        $message->to($mail_array['email'], $mail_array['name'])->subject('Rent Product Payment Invoice');
        $message->from('noreply@th2-0.com');
    });
});

Route::get('/listing-invoice-email', function(){
    return view('email.listing-invoice');
});

Route::get('/cws/send-invoice/{cwsListingPayment}', 'CoWorkSpace\ListingPaypalPaymentController@sendInvoice')->name('co-work-space/send-invoice');

// Route::get('/email', function(){
//     $data['short_subject'] = "WELCOME TO TH2.0";
//     $data['message'] = "Your registration with th2.0 is successful. <br/>Please enjoy your journey with TH2.0.";
//     return view('email.general', compact('data'));
// });

Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');