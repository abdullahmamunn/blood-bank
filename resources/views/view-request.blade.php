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
                                <a href="{{route('home')}}">Request list</a>
                            </li>
                            <li>
                                <a href="{{route('all-donors-list')}}">Donor list</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="text-center">Request Details</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{$view_request->name}}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>{{$view_request->blood_grp}}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{$view_request->location}}</td>
                        </tr>
                        <tr>
                            <th>Phone </th>
                            <td>{{$view_request->phone}}</td>
                        </tr>
                        <tr>
                            <th>Patient </th>
                            <td>{{$view_request->patient}}</td>
                        </tr>
                        <tr>
                            <th>Time Frame </th>
                            <td>{{$view_request->time}}</td>
                        </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#donateBlood">
                        Donate Blood
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
                                            <label>Donate Date</label>
                                            <input type="date" name="last_donate" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Save changes</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

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
