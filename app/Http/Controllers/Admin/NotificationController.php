<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends BaseController
{
    public function index(){
    	$notifications = Notification::all();
    	return view('admin.notification.index', compact('notifications'));
    }

    public function destroy(Request $request){
    	$notification = Notification::findOrFail($request->notification);
    	$notification->delete();
    	return redirect()->back();
    }
}
