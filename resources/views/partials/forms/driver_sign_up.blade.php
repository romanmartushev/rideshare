<form enctype="multipart/form-data" v-cloak>
    <div class="row margin-bottom-xs text-center">
        <div class="col-sm-12"><h2>General Information</h2></div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-sm-4">
            <label for="last_name">Last Name:</label>
            <input class="form-control" type="text" id="last_name" placeholder="Last Name" v-model="last_name">
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="middle_initial">Middle Initial:</label>
            <input class="form-control" type="text" id="middle_initial" placeholder="MI" v-model="middle_initial">
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="first_name">First Name:</label>
            <input class="form-control" type="text" id="first_name" placeholder="First Name" v-model="first_name">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="address">Current Address:</label>
            <input class="form-control" type="text" id="address" placeholder="Current Address" v-model="address">
        </div>
        <div class="form-group col-sm-2">
            <label for="city">City:</label>
            <input class="form-control" type="text" id="city" placeholder="City" v-model="city">
        </div>
        <div class="form-group col-sm-2">
            <label for="state">State:</label>
            <select class="form-control" id="state" name="state" v-model="state">
                <option value="">State</option>
                <option value="AK">Alaska</option>
                <option value="AL">Alabama</option>
                <option value="AR">Arkansas</option>
                <option value="AZ">Arizona</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DC">District of Columbia</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="IA">Iowa</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="MA">Massachusetts</option>
                <option value="MD">Maryland</option>
                <option value="ME">Maine</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MO">Missouri</option>
                <option value="MS">Mississippi</option>
                <option value="MT">Montana</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="NE">Nebraska</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NV">Nevada</option>
                <option value="NY">New York</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="PR">Puerto Rico</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VA">Virginia</option>
                <option value="VT">Vermont</option>
                <option value="WA">Washington</option>
                <option value="WI">Wisconsin</option>
                <option value="WV">West Virginia</option>
                <option value="WY">Wyoming</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label for="zip">Zip:</label>
            <input class="form-control" type="number" id="zip" placeholder="Zip" v-model="zip">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-sm-4">
            <label for="phone">Phone Number:</label>
            <input class="form-control" type="tel" id="phone_number" placeholder="1-(555)-555-5555" v-model="phone_number">
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="referred">Referred By:</label>
            <input class="form-control" type="text" id="referred" placeholder="Referred" v-model="referred">
        </div>
        <div class="form-group col-sm-6 col-sm-4">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" placeholder="E-Mail" v-model="email">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="township">Township:</label>
            <input class="form-control" type="text" id="township" placeholder="Township" v-model="township">
        </div>
        <div class="form-group col-sm-6">
            <label for="day_phone">DayTime Phone:</label>
            <input class="form-control" type="tel" id="day_phone" placeholder="1-(555)-555-5555" v-model="day_phone">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 padding-top-md">Are you over 18?:</label>
        <div class="form-check col-sm-2">
            <input class="form-check-input padding-top-md" name="ageOptions" type="radio" id="18_yes" value="yes" v-model="eight_teen">
            <label class="form-check-label padding-top-md" for="18_yes">Yes</label>
        </div>
        <div class="form-check col-sm-2">
            <input class="form-check-input padding-top-md" name="ageOptions" type="radio" id="18_no" value="no" v-model="eight_teen">
            <label class="form-check-label padding-top-md" for="18_no">No</label>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="prevent">Is there anything that would prevent you from performing in a reasonable and safe manner with the activities involved in the position you have applied? </label>
        </div>
        <div class="form-check col-sm-2 ml-md-3">
            <input class="form-check-input" name="preventOptions" type="radio" id="prevent_yes" value="yes" v-model="prevent">
            <label class="form-check-labeL" for="prevent_yes">Yes</label>
        </div>
        <div class="form-check col-sm-2 ml-md-3">
            <input class="form-check-input" name="preventOptions" type="radio" id="prevent_no" value="no" v-model="prevent">
            <label class="form-check-label" for="prevent_no">No</label>
        </div>
        <div class="form-group col-sm-12">
            <label for="part_time_hours">If yes, please explain:</label>
        </div>
        <div class="form-group col-sm-12">
            <textarea class="form-control" id="prevent" rows="3" v-model="prevent_txt"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="legal">Do you have the legal right to work and remain in the United States?</label>
        </div>
        <div class="form-check col-sm-2 ml-md-3">
            <input class="form-check-input" name="legalOptions" type="radio" id="legal_yes" value="yes" v-model="legal">
            <label class="form-check-labeL" for="legal_yes">Yes</label>
        </div>
        <div class="form-check col-sm-2 ml-md-3">
            <input class="form-check-input" name="legalOptions" type="radio" id="legal_no" value="no" v-model="legal">
            <label class="form-check-label" for="legal_no">No</label>
        </div>
    </div>
    <div class="row margin-bottom-xs text-center">
        <div class="col-sm-12"><h2>Record Of Education</h2></div>
    </div>
    <div class="row" v-for="row in record_education">
        <div class="form-group col-sm-6">
            <label for="school">Name/Address Of School:</label>
            <input class="form-control" type="text" :id="'school'+row.id" placeholder="School" v-model="row.school">
        </div>
        <div class="form-group col-sm-6">
            <label for="study">Course Of Study:</label>
            <input class="form-control" type="text" :id="'study'+row.id" placeholder="Course Of Study" v-model="row.study">
        </div>
        <div class="form-group col-sm-6">
            <label for="yrs_completed">YRS Completed:</label>
            <input class="form-control" type="text" :id="'yrs_completed'+row.id" placeholder="YRS Completed" v-model="row.yrs_completed">
        </div>
        <div class="form-group col-sm-6">
            <label for="graduate">Graduate?:</label>
            <input class="form-control" type="text" :id="'graduate'+row.id" placeholder="Graduate?" v-model="row.graduate">
        </div>
        <div class="form-group col-sm-6">
            <label for="diploma">Diploma/Degree Rec'd:</label>
            <input class="form-control" type="text" :id="'diploma'+row.id" placeholder="Diploma/Degree Rec'd" v-model="row.diploma">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 txt-right txt-size-md">
            <div class="inline-block"><a @click="RemoveEducationRow()"><i id="remove_education_row"class="fa fa-minus-square" aria-hidden="true"></i></a></div>
            <div class="inline-block"><a @click="AddEducationRow()"><i id="add_education_row"class="fa fa-plus-square" aria-hidden="true"></i></a></div>
        </div>
    </div>
    <div class="row margin-bottom-xs text-center">
        <div class="col-sm-12"><h2>Prior Work History</h2></div>
    </div>
    <div class="row" v-for="row in work_history">
        <div class="form-group col-sm-6">
            <label for="dates_to_from">Dates To-From:</label>
            <input class="form-control" type="text" :id="'dates_to_from'+row.id" placeholder="Dates To-From" v-model="row.dates_to_from">
        </div>
        <div class="form-group col-sm-6">
            <label for="employer">Employer Name, Address & Phone:</label>
            <input class="form-control" type="text" :id="'employer'+row.id" placeholder="Employer Name, Address & Phone" v-model="row.employer">
        </div>
        <div class="form-group col-sm-6">
            <label for="rate_pay_start_finish">Rate Of Pay Start-Finish:</label>
            <input class="form-control" type="text" :id="'rate_pay_start_finish'+row.id" placeholder="Rate Of Pay Start-Finish" v-model="row.rate_pay_start_finish">
        </div>
        <div class="form-group col-sm-6">
            <label for="sup_name_title">Supervisor's Name & Title:</label>
            <input class="form-control" type="text" :id="'sup_name_title'+row.id" placeholder="Supervisor's Name & Title" v-model="row.sup_name_title">
        </div>
        <div class="form-group col-sm-6">
            <label for="reason_left">Reason For Leaving:</label>
            <input class="form-control" type="text" :id="'reason_left'+row.id" placeholder="Reason For Leaving" v-model="row.reason_left">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 txt-right txt-size-md">
            <div class="inline-block"><a @click="RemoveWorkRow()"><i id="remove_work_row" class="fa fa-minus-square" aria-hidden="true"></i></a></div>
            <div class="inline-block"><a @click="AddWorkRow()"><i id="add_work_row" class="fa fa-plus-square" aria-hidden="true"></i></a></div>
        </div>
    </div>
    <div class="row margin-bottom-xs text-center">
        <div class="col-sm-12"><h2>Skills</h2></div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="skills">Are there any other experiences, skills or abilities that you feel qualify you for work with our company</label>
            <textarea class="form-control" id="skills" rows="2" v-model="skills"></textarea>
        </div>
    </div>
    <div class="row margin-bottom-xs text-center">
        <div class="col-sm-12"><h2>References</h2></div>
    </div>
    <div class="row" v-for="row in references">
        <div class="form-group col-sm-6">
            <label for="ref_name">Name:</label>
            <input class="form-control" type="text" :id="'ref_name'+row.id" placeholder="Name" v-model="row.name">
        </div>
        <div class="form-group col-sm-6">
            <label for="ref_phone">Phone:</label>
            <input class="form-control" type="text" :id="'ref_phone'+row.id" placeholder="Phone" v-model="row.phone">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 txt-right txt-size-md">
            <div class="inline-block"><a @click="RemoveReferenceRow()"><i id="remove_reference_row" class="fa fa-minus-square" aria-hidden="true"></i></a></div>
            <div class="inline-block"><a @click="AddReferenceRow()"><i id="add_reference_row" class="fa fa-plus-square" aria-hidden="true"></i></a></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="resume">Resume:</label>
            <input type="file" class="form-control-file" id="resume"  @change="processFile($event,'resume')">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="additional_file">Additional Files:</label>
        </div>
    </div>
    <div class="row" v-for="row in additional_files">
        <div class="form-group col-sm-12">
            <input type="file" class="form-control-file"  :id=row.id  @change="processFile($event,row.id)">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 txt-size-md">
            <div class="inline-block"><a @click="RemoveFileRow()"><i id="remove_file" class="fa fa-minus-square" aria-hidden="true"></i></a></div>
            <div class="inline-block"><a @click="AddFileRow()"><i id="add_file" class="fa fa-plus-square" aria-hidden="true"></i></a></div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-sm-12 text-center">
        <button class="btn btn-dark" @click="SubmitDriverInfo">Submit</button>
    </div>
</div>
