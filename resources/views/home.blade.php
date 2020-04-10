@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">



        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                    @can('restrict-info')<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">my info</button>@endcan


                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="card">

                        <div class="card-body">
                                <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User name') }} :</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control-plaintext @error('user_name') is-invalid @enderror" name="user_name" value="{{ Auth::user()->user_name }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control-plaintext @error('full_name') is-invalid @enderror" name="full_name" value="{{ Auth::user()->full_name }}" required autocomplete="full_name" autofocus>

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control-plaintext @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address  }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile.No') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="text" class="form-control-plaintext @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ Auth::user()->mobile_no  }}" required autocomplete="mobile_no" autofocus>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('D.O.B') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control-plaintext @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">

                                <select name="gender" class="custom-select">
                                    <option selected>select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blood_type" class="col-md-4 col-form-label text-md-right">{{ __('Blood Type') }}</label>

                            <div class="col-md-6">

                                <select name="blood_type" class="custom-select">
                                    <option selected>Select your blood type</option>

                                    <option value="">O Positive</option>
                                    <option value="O Negative">O Negative</option>

                                    <option value="A Positive">A Positive</option>
                                    <option value="A Negative">A Negative</option>

                                    <option value="B Positive">B Positive</option>
                                    <option value="B Negative">B Negative</option>

                                    <option value="AB Positive">AB Positive</option>
                                    <option value="AB Negative">AB Negative</option>

                                </select>

                                @error('blood_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control-plaintext @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
