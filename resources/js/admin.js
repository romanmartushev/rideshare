import Vue from 'vue'
import axios from 'axios'

var app = new Vue({
    el:"#admin_app",
    data:{
        customers: [],
        drivers: [],
        driver: {
            name: '',
            email: '',
            phone_number: '',
            address: '',
            password: '',
            password_confirmation: ''
        },
        success: [],
        errors: [],
    },
    methods:{
        createDriver() {
            var vm = this;
            axios.post('/create/driver', {
                name: vm.driver.name,
                email: vm.driver.email,
                phone_number: vm.driver.phone_number,
                password: vm.driver.password,
                password_confirmation: vm.driver.password_confirmation,
                address: vm.driver.address,
            }).then(response => {
                vm.success = response.data;
            }).catch(error => {
                vm.errors = error.response.data.errors;
            });
        }

    },
    mounted() {
        this.customers = initial_customers;
        this.drivers = initial_drivers;
    }
});
