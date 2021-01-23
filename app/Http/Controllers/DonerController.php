<?php

namespace App\Http\Controllers;

use App\Doner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $donor = new Doner();
        $donor->donor_name = $request->donor_name;
        $donor->user_id = $request->user_id;
        $donor->blood_grp = $request->blood_grp;
        $donor->last_donate = $request->last_donate;
        $donor->save();
        return back();
    }

    public function index()
    {
        $allDonors = Doner::all();
        return view('home',compact($allDonors));
    }

}
