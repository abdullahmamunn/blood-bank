@extends('layouts.app')
<style>
    ul{
        list-style-type: none;
    }
</style>
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                      <ul>
                          @if($allRequests)
                              <li>
                                  <a href="{{route('all-user')}}">User Lists</a>
                              </li>
                              <li>
                                  <a href="{{route('all-donor')}}">Donor Lists</a>
                              </li>
                              @else
                              <li>
                                  <a href="{{route('all-request')}}">Blood Requests</a>
                              </li>

                          @endif

                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Blood Requests</div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>User name</th>
                                    <th style="width: 15px">Blood group</th>
                                    <th>Location</th>
                                    <th>phone</th>
                                    <th>Patient </th>
                                    <th>Require Time</th>
                                    <th>Requested at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allRequests as $request)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$request->name}}</td>
                                    <td>{{\App\Files\BloodGroups::$groups[$request->blood_group]}}</td>
                                    <td>{{$request->location}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>{{$request->patient}}</td>
                                    @if($request->time > 1)
                                        <td>{{$request->time}} days</td>
                                    @else
                                        <td>{{$request->time}} day</td>
                                    @endif
                                    <td>{{Carbon\Carbon::parse($request->created_at)->diffForHumans()}}</td>
                                    @if($request->status == 0)
                                        <td>False</td>
                                    @else
                                        <td>Done</td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-primary">view</a>
                                    </td>

                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                {{$allRequests->links()}}
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
