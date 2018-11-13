{{--
Inputs needed:
    Driver gender of choice: M, F, NA
    Cancellation time
--}}
<div id="customer-request">
    <div class="row">
        <div class="col-sm-6 p-0">
            <div class="form-group col-sm-12 col-sm-4">
                <label for="full_name">Full Name:</label>
                <input class="form-control" type="text" id="full_name" placeholder="Full Name" name="full_name" value="{{ $user_info->name }}">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="phone">Phone Number:</label>
                <input class="form-control" type="tel" id="phone_number" placeholder="1-(555)-555-5555" name="phone" value="{{ $user_info->phone_number }}">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender">
                    <option selected value="default">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="age">Age:</label>
                <input min="0" class="form-control" type="number" id="age" placeholder="Age" name="age" value="{{ $user_info->age }}">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="current">Current Address</label>
                <input type="text" class="form-control" id="current_address" aria-describedby="current_address_help" name="current" placeholder="Current Address" value="{{ $user_info->address }}">
                <small id="current_address_help" class="form-text text-muted">Address where you should be picked up at</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="destination">Destination address</label>
                <input type="text" class="form-control" id="destination_address" aria-describedby="destination_address_help" name="destination" placeholder="Destination Address">
                <small id="destination_address_help" class="form-text text-muted">Address where the you should be taken</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="duration">Duration of Service</label>
                <input type="text" class="form-control" id="duration_of_service" aria-describedby="duration_help" name="duration" placeholder="Duration of Service">
                <small id="duration_help" class="form-text text-muted">How much time will you be spending at the destination(s)</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="number_of_passengers">Number of Passengers</label>
                <input min="1" type="number" class="form-control" id="number_of_passengers" name="number_of_passengers" value="1">
            </div>
        </div>
        <div class="col-sm-6pt-5">
            <label for="pickup_time">Time of Pickup</label>
            <div class="col-sm-12 offset-md-3">
                <time-picker v-model="time"/>
            </div>
            <div class="col-sm-12 offset-md-2">
                <section>
                    <date-picker v-model="date"/>
                    <br/>
                    <alert type="info" v-show="date">You selected <b>@{{date}}</b>.</alert>
                </section>
            </div>
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
            <div class="form-group col-sm-12 mt-3">
                <label for="prevent">Do you prefer a male of female driver? (select all that apply)</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Female
                    </label>
                </div>
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
