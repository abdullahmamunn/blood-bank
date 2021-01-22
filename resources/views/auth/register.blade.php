@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Blood Group') }}</label>
                            <div class="col-md-6">
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
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Religion') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="religion" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="weight" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Address') }}</label>
                        
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="union" placeholder="Union" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="post_office" placeholder="Post Office" required>
                                    </div>
                   
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"></label>
                        
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="police_station" placeholder="Police Satation" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="district" placeholder="District" required>
                                    </div>
                   
                        </div>
                        <div class="form-group row mb-0">
                            <label for="" class="col-md-3 col-from-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
