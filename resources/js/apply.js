import Vue from 'vue'
import axios from 'axios'
import 'jquery';
import 'bootstrap';

var app = new Vue({
    el:"#app",
    data:{
        message: "",
        success:false,
        error:false,
        last_name: "",
        middle_initial: "",
        first_name: "",
        address: "",
        city: "",
        state: "",
        zip: "",
        phone_number: "",
        referred: "",
        email: "",
        township: "",
        day_phone: "",
        eight_teen: "",
        prevent: "",
        prevent_txt: "",
        legal: "",
        record_education: [
            {school: "", study:"", yrs_completed:"", graduate: "", diploma: "" , id: 0}
        ],
        work_history: [
            {dates_to_from: "", rate_pay_start_finish: "", employer: "", sup_name_title: "", reason_left: "", id: 0}
        ],
        skills: "",
        references: [
            {name: "", phone: "", id: 0}
        ],
        files: [],
        additional_files: [
            {file: "", id: "file"+ 0}
        ],
        final_files: [],
        resume: "",
        file_id: 0,
        education_id: 0,
        work_id: 0,
        reference_id: 0,
    },
    methods:{
        SubmitDriverInfo(){
            var vm = this;
            var url = "?last_name="+this.last_name+"&middle_initial="+this.middle_initial;
            url += "&first_name="+this.first_name+"&address="+this.address+"&city="+this.city+"&state="+this.state+"&zip="+this.zip+"&phone_number="+this.phone_number+"&referred="+this.referred;
            url += "&email="+this.email+"&township="+this.township+"&day_phone="+this.day_phone+"&eight_teen="+this.eight_teen+"&prevent="+this.prevent;
            url += "&prevent_txt="+this.prevent_txt+"&legal="+this.legal +"&skills="+this.skills;
            var formData = new FormData();
            for( var i = 0; i < this.files.length; i ++) {
                formData.append(this.files[i].id,this.files[i].file);
            }
            formData.append('record_education', JSON.stringify(this.record_education));
            formData.append('work_history', JSON.stringify(this.work_history));
            formData.append('references', JSON.stringify(this.references));
            axios.post("/submit-driver-form"+url,formData)
                .then(function (response) {
                    if(response.data.hasOwnProperty("success")){
                        vm.message = response.data.success;
                        vm.success = true;
                    }else{
                        vm.message = response.data.error;
                        vm.error = true;
                    }
                }).catch(function(e) {
                    vm.message = Object.values(e.response.data);
                    vm.error = true;
            });
        },
        AddEducationRow(){
            this.education_id++;
            this.record_education.push({school: "", study:"", yrs_completed:"", graduate: "", diploma: "", id: this.education_id});
        },
        RemoveEducationRow(){
            if(this.record_education.length > 1){
                this.record_education.pop();
                this.education_id--;
            }
        },
        AddWorkRow(){
            this.work_id++;
            this.work_history.push({dates_to_from: "", rate_pay_start_finish: "", employer: "", sup_name_title: "", reason_left: "" ,id: this.work_id});
        },
        RemoveWorkRow(){
            if(this.work_history.length > 1){
                this.work_history.pop();
                this.work_id--;
            }
        },
        AddReferenceRow(){
            this.reference_id++;
            this.references.push({name: "", phone: "",id: this.reference_id});
        },
        RemoveReferenceRow(){
            if(this.references.length > 1){
                this.references.pop();
                this.reference_id--;
            }
        },
        processFile(event,index) {
            if(event.target.files[0] !== undefined){
                this.files.push({id: index, file: event.target.files[0]});
            }else{
                for( var i = 0; i < this.files.length; i ++){
                    if(this.files[i].id === index){
                        this.files.splice(this.files[i],1);
                    }
                }
            }
        },
        AddFileRow(){
            this.file_id++;
            this.additional_files.push({file: "", id: "file"+ this.file_id});
        },
        RemoveFileRow(){
            if(this.additional_files.length > 1){
                this.additional_files.pop();
                for( var i = 0; i < this.files.length; i ++){
                    if(this.files[i].id === "file"+this.file_id){
                        this.files.splice(this.files[i],1);
                    }
                }
                this.file_id--;
            }
        }
    }
});
