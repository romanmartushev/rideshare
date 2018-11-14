import Vue from 'vue'
import * as uiv from 'uiv'
import axios from 'axios'
Vue.use(uiv);

var main = new Vue({
   el: '#pills-view-requests',
   data:{
       requests: []
   },
   methods: {
       fetchRequests(){
           var vm = this;
           axios.get('/fetch-request')
               .then(response => {
                   vm.requests = response.data;
               })
               .catch(error => {
                   console.log(error);
               });
       },
   },
    mounted(){
        this.fetchRequests();
    }
});

var app = new Vue({
    el:"#customer-request",
    data:{
        time: new Date(),
        date: new Date().getUTCFullYear() + '-' + (new Date().getMonth()+1) + '-' + new Date().getDate(),
        name: '',
        phone_number: '',
        gender: 'default',
        age: 0,
        pick_up_address: '',
        destination_address: '',
        duration_of_service: '',
        number_of_passengers: 1,
        bringing_items: '',
        special_services: '',
        special_services_information: '',
        driver_gender:{
            male: true,
            female: true,
        },
        additional_information: '',
        user: {},
        errors: [],
        success: '',
    },
    methods:{
        submitRequest(){
            var vm = this;
            axios.post('/customer/make-request',{
                time: vm.time,
                date: vm.date,
                name: vm.name,
                phone_number: vm.phone_number,
                gender: vm.gender,
                age: vm.age,
                pick_up_address: vm.pick_up_address,
                destination_address: vm.destination_address,
                duration_of_service: vm.duration_of_service,
                number_of_passengers: vm.number_of_passengers,
                bringing_items: vm.bringing_items,
                special_services: vm.special_services,
                special_services_information: vm.special_services_information,
                driver_gender: vm.driver_gender,
                additional_information: vm.additional_information,
                user_id: vm.user.user_id,
            }).then(response => {
                vm.success = response.data;
                main.fetchRequests();
            }).catch(error => {
                vm.errors = error.response.data.errors;
            });
            setTimeout(() => {
                vm.success = '';
                vm.errors = '';
            },5000)

        },
        setAttributes(data){
            this.name = data.hasOwnProperty('name') ? data.name : '';
            this.phone_number = data.hasOwnProperty('phone_number') ? data.phone_number : '';
            this.gender = data.hasOwnProperty('gender') ? data.gender : 'default';
            this.age = data.hasOwnProperty('age') ? data.age : 0;
            this.pick_up_address = data.hasOwnProperty('address') ? data.address : '';
        }
    },
    mounted(){
        this.setAttributes(initial_user);
        this.user = initial_user;
    }
});
