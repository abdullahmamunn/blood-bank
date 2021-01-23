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
                   </ul>
               </div>
           </div>
        </div>
        <div class="col-md-8">
            <div class="card">
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
                                                <select class="form-control" name="blood_grp" id="">
                                                    <option value="">Select one</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control">
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
            <div class="card-body mt-2">
                <h1 class="text-center">All Blood Requests</h1>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4wjD1J91s6rayhao2o4UcRzF67-gqb2Y&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });
        });
    </script>
@stop
