<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Doner;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $allRequests = BloodRequest::orderBy('created_at','desc')->paginate(5);
        return view('admin.admin-home',compact('allRequests'));
    }

    public function donorList()
    {
        $allDonors = Doner::orderBy('last_donate','desc')->paginate(5);
        return view('admin.all-donors',compact('allDonors'));
    }

    public function userList()
    {
        $users = User::orderBy('created_at','desc')->paginate(5);
        return view('admin.all-user',compact('users'));
    }
}
