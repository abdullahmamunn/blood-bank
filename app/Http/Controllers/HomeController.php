<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Doner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $allRequests = BloodRequest::orderBy('created_at','desc')->paginate(5);
        return view('home',compact('user','allRequests'));
    }
}
