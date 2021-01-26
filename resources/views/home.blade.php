@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
           <div class="card">
               <div class="card-header">Sidebar</div>
               <div class="card-body">
                   <ul>
                       <li>
                           <a href="">Request list</a>
                       </li>
                       <li>
                           <a href="{{route('all-donors-list')}}">Donor list</a>
                       </li>
                       <li>
                           <a href="{{route('time-date')}}">time-date</a>
                       </li>
                   </ul>
               </div>
           </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="padding-bottom: 45px">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as User!
                        <a href="{{route('user.logout')}}">User Logout</a> --}}
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requestBlood">
                           Request Blood
                         </button>

                         <!-- Modal for Request blood-->
                         <div class="modal fade" id="requestBlood" tabindex="-1" role="dialog" aria-labelledby="donateBlood" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="">Request For Blood</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('blood-request')}}" method="post">
                                           @csrf
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                            </div>
{{--                                             <div class="form-group">--}}
{{--                                                <label>Name</label>--}}
{{--                                                 <input type="text" id="txtPlaces" style="width: 250px" placeholder="Enter a location" />--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <label>Blood group</label>
                                                <select class="form-control" name="blood_group" id="">
                                                    <option value="">Select one</option>
                                                    @foreach(\App\Files\BloodGroups::$groups as $key => $group)
                                                        <option value="{{ $key }}">{{ $group }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
{{--                                                <input type="text" name="location" class="form-control">--}}
                                                <input type="text" name="location" class="form-control" id="search" placeholder="Type address..." />
                                            </div>
                                             <div class="form-group">
                                                 <label>Phone</label>
                                                 <input type="text" name="phone" class="form-control">
                                             </div>
                                             <div class="form-group">
                                                 <label>Patient</label>
                                                 <input type="text" name="patient" class="form-control">
                                             </div>
                                             <div class="form-group">
                                                 <label>Time Range(day)</label>
                                                 <input type="number" name="time" class="form-control">
                                             </div>
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-body mt-2">
                <h1 class="text-center">All Blood Requests</h1>
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>User name</th>
                        <th>Blood group</th>
                        <th>Location</th>
                        <th>phone</th>
                        <th>Patient</th>
                        <th>Require time</th>
                        <th>Requested at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allRequests as $request)
                        <tr>
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
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($request->created_at))->diffForHumans()}}</td>
                            @if($request->status == 0)
                                <td>False</td>
                             @else
                                <td class="text-success"> <b>Done</b> <br> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($request->updated_at))->diffForHumans()}}</td>
                            @endif

                            <td>
                                <a href="{{route('view-request',$request->id)}}" class="btn btn-primary">view</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $allRequests->links() }}
    </div>
</div>
@endsection
@section('js')
    <script>
        var searchInput = 'search';

        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                /*componentRestrictions: {
                 country: "USA"
                }*/
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                let near_place = autocomplete.getPlace();
                console.log(near_place);

            });
        });
    </script>
@stop
