<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CwsListingPayment;
use App\Models\CwsPayment;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
    public function cwsListingTransaction(){
    	$listingPayments = CwsListingPayment::all();
    	return view('admin.transactions.listing', compact('listingPayments'));
    }

    public function cwsBookingTransaction(){
    	$bookingPayments = CwsPayment::all();
    	return view('admin.transactions.booking', compact('bookingPayments'));
    }
}
