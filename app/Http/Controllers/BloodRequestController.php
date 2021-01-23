<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function store(Request $request)
    {
//        return $request->all();
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'blood_grp' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'patient' => 'required',
            'time' => 'required',
        ]);

        $request_blood = new BloodRequest();
        $request_blood->name = $request->name;
        $request_blood->user_id = $request->user_id;
        $request_blood->blood_grp = $request->blood_grp;
        $request_blood->location = $request->location;
        $request_blood->phone = $request->phone;
        $request_blood->patient = $request->patient;
        $request_blood->time = $request->time;
        $request_blood->save();
        return back();

     }
}
