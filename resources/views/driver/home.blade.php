@extends('layouts.app')

@section('content')
    <div class="container" id="driver_root">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-view-requests-tab" data-toggle="pill" href="#pills-view-requests" role="tab" aria-controls="pills-view-requests" aria-selected="false">View Requests</a>
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
                                            Welcome {{$user_info->name}}!
                                            Latitude: @{{ lat }}
                                            Longitude: @{{ long }}
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Full Name</th>
                                                    <td>{{$user_info->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone Number</th>
                                                    <td>{{$user_info->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address</th>
                                                    <td>{{$user_info->address}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="pills-view-requests" role="tabpanel" aria-labelledby="pills-view-requests-tab">
                                            <table class="table">
                                                <ul v-for="(request, index) in requests">
                                                    <h1>Request @{{ index+1 }}</h1>
                                                    <li>Status: @{{ request.status }}</li>
                                                    <li>Pick Up Address @{{ request.pick_up_address }}</li>
                                                    <li>Destination Address: @{{ request.destination_address }}</li>
                                                    <li>Bringing Items: @{{ request.bringing_items }}</li>
                                                    <li>Time: @{{ request.time }}</li>
                                                    <li>Date: @{{ request.date }}</li>
                                                    <li>Number of Passengers: @{{ request.number_of_passengers }}</li>
                                                    <li>Duration of Service: @{{ request.duration_of_service }}</li>
                                                    <li>Special Services: @{{ request.special_services }}</li>
                                                    <li>Special Services Info.: @{{ request.special_services_information }}</li>
                                                    <li>Additional Info.: @{{ request.additional_information }}</li>
                                                </ul>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/driver.js"></script>
@endsection
