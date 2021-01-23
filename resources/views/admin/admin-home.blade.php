@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Blood Requests</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>User name</th>
                                    <th>Blood group</th>
                                    <th>Location</th>
                                    <th>phone</th>
                                    <th>Patient relative</th>
                                    <th>Require time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allRequests as $request)
                                <tr>
                                    <td>{{$request->name}}</td>
                                    <td>{{$request->blood_grp}}</td>
                                    <td>{{$request->location}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>{{$request->patient}}</td>
                                    @if($request->time > 1)
                                        <td>{{$request->time}} days</td>
                                    @else
                                        <td>{{$request->time}} day</td>
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
