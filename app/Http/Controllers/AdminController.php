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
        $allRequests = BloodRequest::all();
        return view('admin.admin-home',compact('allRequests'));
    }

    public function userList()
    {
        $allUsers = Doner::all();
        return view('admin.all-users',compact('allUsers'));
    }
}
