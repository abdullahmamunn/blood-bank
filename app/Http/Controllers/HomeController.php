<?php

namespace App\Http\Controllers;

use App\Doner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $allDonors = Doner::all();
        return view('home',compact('user','allDonors'));
    }
}
