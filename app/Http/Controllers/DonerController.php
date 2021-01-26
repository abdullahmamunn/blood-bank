<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Doner;
use App\Files\BloodGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DonerController extends Controller
{
    public function store(Request $request,$id)
    {
        return $request->all();
        $validated = $request->validate([
            'donor_name' => 'required',
            'blood_group' => 'required',
        ]);
//        $check_status = BloodRequest::select('status')->where('id','$id')->first();
        $check_status = BloodRequest::find($id, ['status','blood_group']);
//        dd(BloodGroups::$groups[$check_status->blood_group]);
        if($check_status->status == 0)
        {
            if( BloodGroups::$groups[$check_status->blood_group] == $request->blood_group )
            {
                $status_update = BloodRequest::find($id);
                $status_update->status = 1;
                $status_update->save();
                $donor = new Doner();
                $donor->donor_name = $request->donor_name;
                $donor->user_id = $request->user_id;
                $donor->blood_group = $request->blood_group;
                $donor->save();
                return back();
            }
            else{
                return "blood group didn't match";
            }

        }
        else{
            return "all ready blood donated ";
        }
//        dd($check_status);
//        return $check_status;
//        $date = Doner::where('user_id',Auth::user()->id)->select('created_at')->first();

//
////        $months =  Carbon::parse($date->created_at)->month;
//        if($date == null)
//        {
//            $donor = new Doner();
//            $donor->donor_name = $request->donor_name;
//            $donor->user_id = $request->user_id;
//            $donor->blood_grp = $request->blood_grp;
//            $donor->save();
//            return back();
//
//        }
//        else
//        {
//            return "you can't donate now!";
//        }


    }

    public function donorLists()
    {

        $allDonors = Doner::orderBy('created_at','desc')->paginate(5);
//        $creted_date = Carbon::parse($allDonors->created_at);
//        $expire_dt  = $creted_date->addDays(90)->toDayDateTimeString();
        return view('donor-list',compact('allDonors'));
    }

}
