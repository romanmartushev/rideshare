@extends('layouts.app')

@section('content')
    <div class="container" id="admin_app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-customers" role="tab" aria-controls="pills-customers" aria-selected="false">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-drivers" role="tab" aria-controls="pills-drivers" aria-selected="false">Drivers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-create-driver" role="tab" aria-controls="pills-create-driver" aria-selected="false">Create Driver</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        Welcome Admin!
                                    </div>
                                    <div class="tab-pane fade" id="pills-customers" role="tabpanel" aria-labelledby="pills-profile-tab" style="overflow-x: scroll">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <th scope="row">Email</th>
                                                <th scope="row">Phone Number</th>
                                                <th scope="row">Address</th>
                                                <th scope="row">Rating</th>
                                            </tr>
                                            <tr v-for="customer in customers">
                                                <td>@{{ customer.name }}</td>
                                                <td>@{{ customer.email }}</td>
                                                <td>@{{ customer.phone_number }}</td>
                                                <td>@{{ customer.address }}</td>
                                                <td>@{{ customer.rating }}/5</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-drivers" role="tabpanel" aria-labelledby="pills-contact-tab" style="overflow-x: scroll">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <th scope="row">Email</th>
                                                <th scope="row">Phone Number</th>
                                                <th scope="row">Address</th>
                                                <th scope="row">Rating</th>
                                            </tr>
                                            <tr v-for="driver in drivers">
                                                <td>@{{ driver.name }}</td>
                                                <td>@{{ driver.email }}</td>
                                                <td>@{{ driver.phone_number }}</td>
                                                <td>@{{ driver.address }}</td>
                                                <td>@{{ driver.rating }}/5</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-create-driver" role="tabpanel" aria-labelledby="pills-create-driver-tab">
                                        <form @submit.prevent="createDriver">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus v-model="driver.name">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                                <div class="col-md-6">
                                                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus v-model="driver.phone_number">
                                                    @if ($errors->has('phone_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Default Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus v-model="driver.address">
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required v-model="driver.email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required v-model="driver.password">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required v-model="driver.password_confirmation">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                            {{--TODO: Error and success detection--}}
                                            <ul class="list-group">
                                                <li v-if="success.hasOwnProperty('name')" class="list-group-item list-group-item-success">The driver @{{ success.name }} was successfully created</li>
                                                <li v-for="error in errors" class="list-group-item list-group-item-danger">@{{ error[0] }}</li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var initial_customers = {!! $customers !!};
        var initial_drivers = {!! $drivers !!};
    </script>
    <script src="/js/admin.js"></script>
@endsection
