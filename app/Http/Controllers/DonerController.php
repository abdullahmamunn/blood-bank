<?php

namespace App\Http\Controllers;

use App\Doner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DonerController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'donor_name' => 'required',
            'user_id' => 'required',
            'blood_grp' => 'required',
            'last_donate' => 'required'
        ]);
        $date = Doner::where('user_id',Auth::user()->id)->select('created_at')->first();

//        $months =  Carbon::parse($date->created_at)->month;
        if($date == null)
        {
            $donor = new Doner();
            $donor->donor_name = $request->donor_name;
            $donor->user_id = $request->user_id;
            $donor->blood_grp = $request->blood_grp;
            $donor->last_donate = $request->last_donate;
            $donor->save();
            return back();

        }
        else
        {
            return "you can't donate now!";
        }


    }

    public function donorLists()
    {

        $allDonors = Doner::orderBy('last_donate','desc')->paginate(5);
        return view('donor-list',compact('allDonors'));
    }

}
