@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#donateBlood">
                           Donate Blood
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requestBlood">
                           Request Blood
                         </button>

                        <!-- Modal for donate blood-->
                        <div class="modal fade" id="donateBlood" tabindex="-1" role="dialog" aria-labelledby="donateBlood" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="">Donate Blood</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user-donate')}}" method="post"> 
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="donor_name" value="{{$user->name}}" class="form-control">
                                            <input type="hidden" name="user_id" value="{{$user->id}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Blood group</label>
                                            <input type="text" name="blood_grp" value="{{$user->blood_grp}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Donate</label>
                                            <input type="date" name="last_donate" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Save changes</button>
                                    </form>
                                </div>

                            </div>
                            </div>
                        </div>

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
        </div>
        <div class="col-md-8">
            <div class="card-body mt-2">
                <h2 class="text-center">Donor List</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Donor Name</th>
                        <th>Blood Group</th>
                        <th>Last Donate</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allDonors as $donors)
                    <tr>
                        <td>{{$donors->donor_name}}</td>
                        <td>{{$donors->blood_grp}}</td>
                        <td>{{$donors->last_donate}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
