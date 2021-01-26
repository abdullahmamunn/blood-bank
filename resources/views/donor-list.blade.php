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
                    <h2 class="text-center">Donor List</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Donor Name</th>
                            <th>Blood Group</th>
                            <th>Last Donate</th>
                            <th>Next Donate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allDonors as $donors)
{{--                            $created = \Carbon\Carbon::parse( $donors->created_at )--}}
{{--                            $expire_dt  = $created_date->addDays(90)->toDayDateTimeString();--}}

                            @php
                                $created = \Carbon\Carbon::parse( $donors->created_at );
                            @endphp
                            <tr>
                                <td>{{$donors->donor_name}}</td>
                                <td>{{$donors->blood_grp}}</td>
                                <td>{{$created->toFormattedDateString()}}</td>
                                <td>{{$created->addDays(90)->toFormattedDateString()}}</td>

                             </tr>
                        @endforeach

                        </tbody>
    </table>
</div>
{{$allDonors->links()}}
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
