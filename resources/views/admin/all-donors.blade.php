@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                      <ul>
                          @if($allDonors)
                              <li>
                                  <a href="{{route('all-user')}}">User Lists</a>
                              </li>
                              <li>
                                  <a href="{{route('all-request')}}">Blood Requests</a>
                              </li>
                          @else
                              <li>
                                  <a href="{{route('all-donor')}}">Donor Lists</a>
                              </li>
                          @endif
                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Donor lists</div>
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
                               @foreach($allDonors as $donor)
                               <tr>
                                   <td>{{$donor->user->name}}</td>
                                   <td>{{$donor->blood_grp}}</td>
                                   <td>{{$donor->created_at}}</td>
                                   <td>{{$donor->user->phone}}</td>
                                   <td>
                                       {{$donor->user->district}}
                                   </td>

                               </tr>
                                   @endforeach
                               </tbody>
                           </table>
                        </div>
                </div>
                {{$allDonors->links()}}
            </div>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
