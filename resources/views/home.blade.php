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
                                         <form action="" method="post">
                                            
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Blood group</label>
                                                <input type="text" name="blood_grp" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Donate</label>
                                                <input type="date" name="l_donate" class="form-control">
                                            </div>
                                        </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                                         <form action="" method="post">
                                            
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Blood group</label>
                                                <input type="text" name="blood_grp" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Donate</label>
                                                <input type="date" name="l_donate" class="form-control">
                                            </div>
                                        </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
