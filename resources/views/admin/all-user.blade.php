@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <ul>
                            @if($users)
                                <li>
                                    <a href="{{route('all-donor')}}">Donor Lists</a>
                                </li>
                                <li>
                                    <a href="{{route('all-request')}}">Blood Requests</a>
                                </li>
                            @else
                                <li>
                                    <a href="">User Lists</a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All User lists</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Donor name</th>
                                <th>Blood group</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{ \App\Files\BloodGroups::$groups[$user->blood_group] }}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">view</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$users->links()}}
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
