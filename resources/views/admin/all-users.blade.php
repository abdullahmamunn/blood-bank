@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                      <ul>
                          <li>
                              <a href="{{route('all-user')}}">User List</a>
                          </li>
                          <li>
                              <a href="{{route('all-request')}}">Blood Request</a>
                          </li>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Donor list</div>
                        <div class="card-body">
                           <table class="table table-bordered">
                               <thead>
                               <tr>
                                    <th>Donor name</th>
                                    <th>Blood group</th>
                                    <th>Last Donate</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($allUsers as $users)
                               <tr>
                                   <td>{{$users->user->name}}</td>
                                   <td>{{$users->blood_grp}}</td>
                                   <td>{{$users->last_donate}}</td>
                                   <td>{{$users->user->phone}}</td>
                                   <td>
                                       {{$users->user->district}}
                                   </td>

                               </tr>
                                   @endforeach
                               </tbody>
                           </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
