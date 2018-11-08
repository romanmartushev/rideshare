<html lang="{{ config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <Title>APPLICATION FOR EMPLOYMENT</Title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    .bg-color-black{
        background-color: #151313;
    }
    .margin-bottom-xs {
        margin-bottom: 29.25px;
        margin-bottom: 1.82812rem;
    }
    .bold {
        font-weight: 700;
    }
    .txt-size-md {
        font-size: 32px;
        font-size: 2rem;
    }
    .txt-color-white {
        color: #ffffff;
    }
    .border {
        border: 1px solid #6CADDF;
    }
    .border-xs {
        border-width: 7.3125px;
        border-width: 0.45703rem;
    }
    .border-color-black {
        border-color: #151313;
    }
</style>
<body>
<div class="container" id="application_submit">
    <div class="row">
        <h2>APPLICATION FOR EMPLOYMENT</h2>
    </div>
    <div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Position Applied For:</label>
                <input class="form-control" readonly value="Driver">
            </div>
        </div>
        <div class="row bg-color-black margin-bottom-xs">
            <div class="col-sm-12 bold txt-size-md txt-color-white">General Information</div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-sm-4">
                <label for="last_name">Last Name:</label>
                <input class="form-control" readonly value="{{$last_name}}">
            </div>
            <div class="form-group col-sm-6 col-sm-4">
                <label for="middle_initial">Middle Initial:</label>
                <input class="form-control" readonly value="{{$middle_initial}}">
            </div>
            <div class="form-group col-sm-6 col-sm-4">
                <label for="first_name">First Name:</label>
                <input class="form-control" readonly value="{{$first_name}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="address">Current Address:</label>
                <input class="form-control" readonly value="{{$address}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="city">City:</label>
                <input class="form-control" readonly value="{{$city}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="state">State:</label>
                <input class="form-control" readonly value="{{$state}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="zip">Zip:</label>
                <input class="form-control" readonly value="{{$zip}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-sm-4">
                <label for="phone">Phone Number:</label>
                <input class="form-control" readonly value="{{$phone_number}}">
            </div>
            <div class="form-group col-sm-6 col-sm-4">
                <label for="referred">Referred By:</label>
                <input class="form-control" readonly value="{{$referred}}">
            </div>
            <div class="form-group col-sm-6 col-sm-4">
                <label for="email">Email:</label>
                <input class="form-control" readonly value="{{$email}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="township">Township:</label>
                <input class="form-control" readonly value="{{$township}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="day_phone">DayTime Phone:</label>
                <input class="form-control" readonly value="{{$day_phone}}">
            </div>
        </div>
        <div class="row">
            <div class="form-check col-sm-4">
                <label>Are you over 18?:</label>
                <input class="form-control" readonly value="{{$eight_teen}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="prevent">Is there anything that would prevent you from performing in a reasonable and safe manner the activities involved in the position you have applied? </label>
            </div>
            <div class="form-check col-sm-2">
                <input class="form-control" readonly value="{{$prevent}}">
            </div>
            <div class="form-group col-sm-12">
                <label for="part_time_hours">If yes, please explain:</label>
            </div>
            <div class="form-group col-sm-12">
                @if($prevent == "yes")
                    <div class="border border-color-black border-xs">{{$prevent_txt}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="legal">Do you have the legal right to work and remain in the United States?</label>
            </div>
            <div class="form-check col-sm-2">
                <input class="form-control" readonly value="{{$legal}}">
            </div>
        </div>
        <div class="row bg-color-black margin-bottom-xs">
            <div class="col-sm-12 bold txt-size-md txt-color-white">Record Of Education</div>
        </div>
        @if(count($record_education) > 0)
            @foreach($record_education as $record)
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="school">Name/Address Of School:</label>
                    <input class="form-control" readonly value="{{$record->school}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="study">Course Of Study:</label>
                    <input class="form-control" readonly value="{{$record->study}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="yrs_completed">YRS Completed:</label>
                    <input class="form-control" readonly value="{{$record->yrs_completed}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="graduate">Graduate?:</label>
                    <input class="form-control" readonly value="{{$record->graduate}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="diploma">Diploma/Degree Rec'd:</label>
                    <input class="form-control" readonly value="{{$record->diploma}}">
                </div>
            </div>
        @endforeach
        @endif
        <div class="row bg-color-black margin-bottom-xs">
            <div class="col-sm-12 bold txt-size-md txt-color-white">Prior Work History</div>
        </div>
        @if(count($work_history) > 0)
            @foreach($work_history as $record)
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="dates_to_from">Dates To-From:</label>
                    <input class="form-control" readonly value="{{$record->dates_to_from}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="employer">Employer Name, Address & Phone:</label>
                    <input class="form-control" readonly value="{{$record->employer}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="rate_pay_start_finish">Rate Of Pay Start-Finish:</label>
                    <input class="form-control" readonly value="{{$record->rate_pay_start_finish}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="sup_name_title">Supervisor's Name & Title:</label>
                    <input class="form-control" readonly value="{{$record->sup_name_title}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="reason_left">Reason For Leaving:</label>
                    <input class="form-control" readonly value="{{$record->reason_left}}">
                </div>
            </div>
        @endforeach
        @endif
        @if($skills != "")
            <div class="row bg-color-black margin-bottom-xs">
                <div class="col-sm-12 bold txt-size-md txt-color-white">Skills</div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">

                    <div class="border border-color-black border-xs">{{$skills}}</div>
                </div>
            </div>
        @endif
        <div class="row bg-color-black margin-bottom-xs">
            <div class="col-sm-12 bold txt-size-md txt-color-white">References</div>
        </div>
        @if(count($references) > 0)
            @foreach($references as $record)
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="ref_name">Name:</label>
                    <input class="form-control" readonly value="{{$record->name}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="ref_phone">Phone:</label>
                    <input class="form-control" readonly value="{{$record->phone}}">
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
</body>
</html>
