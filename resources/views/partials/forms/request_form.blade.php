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
                <input class="form-control" type="text" id="full_name" placeholder="Full Name" name="full_name" v-model="name">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="phone">Phone Number:</label>
                <input class="form-control" type="tel" id="phone_number" placeholder="1-(555)-555-5555" name="phone" v-model="phone_number">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" v-model="gender">
                    <option selected value="default">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="age">Age:</label>
                <input min="0" class="form-control" type="number" id="age" placeholder="Age" name="age" v-model="age">
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="current">Current Address</label>
                <input type="text" class="form-control" id="current_address" aria-describedby="current_address_help" name="current" placeholder="Current Address" v-model="pick_up_address">
                <small id="current_address_help" class="form-text text-muted">Address where you should be picked up at</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="destination">Destination address</label>
                <input type="text" class="form-control" id="destination_address" aria-describedby="destination_address_help" name="destination" placeholder="Destination Address" v-model="destination_address">
                <small id="destination_address_help" class="form-text text-muted">Address where the you should be taken</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="duration">Duration of Service</label>
                <input type="text" class="form-control" id="duration_of_service" aria-describedby="duration_help" name="duration" placeholder="Duration of Service" v-model="duration_of_service">
                <small id="duration_help" class="form-text text-muted">How much time will you be spending at the destination(s)</small>
            </div>
            <div class="form-group col-sm-12 col-sm-4">
                <label for="number_of_passengers">Number of Passengers</label>
                <input min="1" type="number" class="form-control" id="number_of_passengers" name="number_of_passengers" value="1" v-model="number_of_passengers">
            </div>
        </div>
        <div class="col-sm-6 pt-5">
            <label for="pickup_time">Time of Pickup</label>
            <div class="col-sm-12 offset-md-3">
                <time-picker v-model="time"/>
            </div>
            <div class="col-sm-12 offset-md-2">
                <section>
                    <date-picker v-model="date"/>
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
                <input class="form-check-input" name="items" type="radio" id="items_yes" value="yes" v-model="bringing_items">
                <label class="form-check-label" for="items_yes">Yes</label>
            </div>
            <div class="form-check col-sm-2 ml-3">
                <input class="form-check-input" name="items" type="radio" id="items_no" value="no" v-model="bringing_items">
                <label class="form-check-label" for="items_no">No</label>
            </div>
            <div class="form-group col-sm-12 mt-3">
                <label for="prevent">Do you prefer a male of female driver? (select all that apply)</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="defaultCheck1" v-model="driver_gender.male">
                    <label class="form-check-label" for="defaultCheck1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="false" id="defaultCheck1" v-model="driver_gender.female">
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
                <input class="form-check-input" name="special_services" type="radio" id="special_services_yes" value="yes" v-model="special_services">
                <label class="form-check-label" for="special_services_yes">Yes</label>
            </div>
            <div class="form-check col-sm-6 ml-3">
                <input class="form-check-input" name="special_services" type="radio" id="special_services_no" value="no" v-model="special_services">
                <label class="form-check-label" for="special_services_no">No</label>
            </div>
            <div class="form-group col-sm-12">
                <label for="special_services_text">If yes, please explain so we could better accommodate your needs:</label>
            </div>
            <div class="form-group col-sm-12">
                <textarea class="form-control" id="special_services_text" name="special_services_text" rows="3" v-model="special_services_information"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="additional_text">Any additional information</label>
        </div>
        <div class="form-group col-sm-12">
            <textarea class="form-control" id="additional_text" name="additional_text" rows="3" v-model="additional_information"></textarea>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12 text-center">
            <button class="btn btn-dark" @click="submitRequest">Make Request</button>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <ul class="list-group col-sm-10">
            <li v-if="success.hasOwnProperty('name')" class="list-group-item list-group-item-success">The request was successfully created.</li>
            <li v-for="error in errors" class="list-group-item list-group-item-danger">@{{ error[0] }}</li>
        </ul>
    </div>
</div>
<script>
    var initial_user = {!! $user_info !!};
</script>
<script src="/js/request.js"></script>
