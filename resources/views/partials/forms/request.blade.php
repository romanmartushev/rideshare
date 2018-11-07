<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup Request</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="text-center">
    <h1>Pickup Request</h1>
</div>
{{--
Inputs needed:
    Driver gender of choice: M, F, NA
    Cancellation time
--}}
<div class="container" id="app">
    <div class="row">
        <div class="form-group col-sm-6 col-sm-4">
            <label for="last_name">Last Name:</label>
            <input class="form-control" type="text" id="last_name" placeholder="Last Name" name="last_name">
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="first_name">First Name:</label>
            <input class="form-control" type="text" id="first_name" placeholder="First Name" name="first_name">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-sm-4">
            <label for="phone">Phone Number:</label>
            <input class="form-control" type="tel" id="phone_number" placeholder="1-(555)-555-5555" name="phone">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-sm-4">
            <label for="current">Current Address</label>
            <input type="text" class="form-control" id="current_address" aria-describedby="current_address_help" name="current" placeholder="Current Address">
            <small id="current_address_help" class="form-text text-muted">Address where you should be picked up at</small>
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="destination">Destination address</label>
            <input type="text" class="form-control" id="destination_address" aria-describedby="destination_address_help" name="destination" placeholder="Destination Address">
            <small id="destination_address_help" class="form-text text-muted">Address where the you should be taken</small>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group col-sm-12">
                <label for="pickup_time">Time of Pickup</label>
                <section>
                    <date-picker v-model="date"/>
                    <br/>
                    <alert type="info" v-show="date">You selected <b>@{{date}}</b>.</alert>
                </section>
                <small id="time_help" class="form-text text-muted">Time you need to be picked up</small>
            </div>
            <div class="col-sm-12">
                <time-picker v-model="time"/>
            </div>
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="duration">Duration of Service</label>
            <input type="text" class="form-control" id="duration_of_service" aria-describedby="duration_help" name="duration" placeholder="Duration of Service">
            <small id="duration_help" class="form-text text-muted">How much time will you be spending at the destination(s)</small>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-4">
            <div class="form-group col-sm-12">
                <label for="prevent">Are you bringing any items or buying any items that may be "large"?</label>
            </div>
            <div class="form-check col-sm-2 ml-3">
                <input class="form-check-input" name="items" type="radio" id="items_yes" value="yes">
                <label class="form-check-label" for="items_yes">Yes</label>
            </div>
            <div class="form-check col-sm-2 ml-3">
                <input class="form-check-input" name="items" type="radio" id="items_no" value="no">
                <label class="form-check-label" for="items_no">No</label>
            </div>
            <div class="form-group col-sm-12">
                <label for="special_services_text">If yes, please explain so we could better accommodate your needs:</label>
            </div>
            <div class="form-group col-sm-12">
                <textarea class="form-control" id="special_services_text" name="special_services_text" rows="3"></textarea>
            </div>
        </div>
        <div class="col-sm-6 col-sm-4">
            <div class="form-group col-sm-12">
                <label for="prevent">Do you require any special services or do you have a disability?</label>
            </div>
            <div class="form-check col-sm-6 ml-3">
                <input class="form-check-input" name="special_services" type="radio" id="special_services_yes" value="yes">
                <label class="form-check-label" for="special_services_yes">Yes</label>
            </div>
            <div class="form-check col-sm-6 ml-3">
                <input class="form-check-input" name="special_services" type="radio" id="special_services_no" value="no">
                <label class="form-check-label" for="special_services_no">No</label>
            </div>
            <div class="form-group col-sm-12">
                <label for="special_services_text">If yes, please explain so we could better accommodate your needs:</label>
            </div>
            <div class="form-group col-sm-12">
                <textarea class="form-control" id="special_services_text" name="special_services_text" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="additional_text">Any additional information</label>
        </div>
        <div class="form-group col-sm-12">
            <textarea class="form-control" id="additional_text" name="additional_text" rows="3"></textarea>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12 text-center">
            <button class="btn btn-dark">Make Request</button>
        </div>
    </div>
    {{--<div class="row mt-5 mb-5">--}}
        {{--<div class="col-sm-10">--}}
            {{--<div v-if="error !== ''" class="alert alert-danger" v-cloak>--}}
                {{--@{{error}}--}}
            {{--</div>--}}
            {{--<div v-if="success !== ''" class="alert alert-success" v-cloak>--}}
                {{--@{{success}}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
<script src="/js/request.js"></script>
</body>
</html>
