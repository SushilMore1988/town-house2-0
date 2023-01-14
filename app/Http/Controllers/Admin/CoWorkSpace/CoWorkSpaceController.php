<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use App\Models\Cws;
use App\Models\User;
use App\Notifications\CwsStatusNotification;
use Illuminate\Http\Request;

class CoWorkSpaceController extends BaseController
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
        $coWorkSpaces = Cws::all();
        return view('admin.co-work.index',compact('coWorkSpaces'));
    }


    public function show($id)
    {
        $coWorkSpaces = Cws::where('user_id',$id)->get();
        return view('admin.user.cowork-space-list',compact('coWorkSpaces'));
    }

    public function destroy($id)
    {
        $coWorkSpace = Cws::findOrFail($id);
        
        // $this->deletePackages($coWorkSpace);
        
        // $this->deletePhotos($coWorkSpace);
        
        // $this->deletePrice($coWorkSpace);
       
        // $this->deleteSize($coWorkSpace);
        
        // $this->deleteOpeningHours($coWorkSpace);
        
        // $this->deleteLocation($coWorkSpace);
        
        // $this->deleteFacilities($coWorkSpace);
        
        if($coWorkSpace->delete()){
            toastr()->success('Cowork  space deleted successfully');                 
            return redirect()->back();
        }

    }

    /**
     * Delete packages .
     *
     * @param  $coWorkSpace
     *
     */
    public function deletePackages($coWorkSpace)
    {
        foreach($coWorkSpace->cwsPackages as  $package){
            $package->delete();
        }
    }


    public function changeStatus($cws, $is_approved){ 
        $status = null;
        if($is_approved == 1){
            $status = "approved";
        }else{
            $status = "rejected";
        }
        $cws = Cws::findOrFail($cws);
        $cws->is_approved = $is_approved;
        $cws->admin_status = "Active";
        $cws->status = 3; 
        $cws->save();
        $data = ['short_subject' => "$cws->name is $status", 'message' => 'Your space '.$cws->name.' is '.$status.' by TH2-0 admin.', 'link' => url('/co-work-space/edit/'.$cws->slug)];
        $user = User::findOrFail($cws->user_id);
        $user->notify(new CwsStatusNotification($data));
        return response()->json(['success' => true]);
    }

    public  function rating($id, $rating){
        $cws = Cws::findOrFail($id);
        $cws->admin_rating = $rating;
        $cws->is_approved = "1";
        $cws->admin_status = "Active";
        if($cws->save()){
            $data = ['short_subject' => "$cws->name is approved", 'message' => 'Your space '.$cws->name.' is approved by TH2-0 admin.', 'link' => url('/co-work-space/edit/'.$cws->slug)];
            $user = User::findOrFail($cws->user_id);
            $user->notify(new CwsStatusNotification($data));
            return response()->json(['success' => true]); 
        }

    }

    public function changeAdminStatus($id, $status){
        $cws = Cws::findOrFail($id);
        $cws->admin_status = $status;
        if($cws->save()){
            return response()->json(['success' => true]);
        }

    }

    public function ownersList(){
        $owners = User::has('cws')->get();
        return view('admin.user.cws-owner', compact('owners'));
    }

}
