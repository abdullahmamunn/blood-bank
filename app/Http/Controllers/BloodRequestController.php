<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    public function store(Request $request)
    {
//       return $request->all();
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'blood_group' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'patient' => 'required',
            'time' => 'required',
        ]);

        $request_blood = new BloodRequest();
        $request_blood->name = $request->name;
        $request_blood->user_id = $request->user_id;
        $request_blood->blood_group = $request->blood_group;
        $request_blood->location = $request->location;
        $request_blood->phone = $request->phone;
        $request_blood->patient = $request->patient;
        $request_blood->time = $request->time;
        $request_blood->save();
        return back();

     }

    public function viewRequest($id)
    {
        $view_request = BloodRequest::findOrFail($id);
        $user = User::where('id',Auth::user()->id)->first();
        return view('view-request',compact('view_request','user'));
    }
}
