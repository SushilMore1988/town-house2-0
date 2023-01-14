<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.user.index',compact('users'));
    }

    public  function changeStatus($id, $status){
        $user = User::withTrashed()->findOrFail($id);
        if($status == 'block'){
            $user->delete();
            return response()->json(['success' => 'true', 'message' => 'User block  successfully']);
        }else{
            $user->restore();
            return response()->json(['success' => 'true', 'message' => 'User unblock  successfully']);

        }
    }
}
