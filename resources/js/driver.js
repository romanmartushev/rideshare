import Vue from 'vue'
import axios from "axios";

var app = new Vue({
    el: '#driver_root',
    data: {
        lat: '',
        long: '',
        requests: [],
    },
    methods: {
        getLocation(){
            var vm = this;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the coordinates of the current position.
                    vm.lat = position.coords.latitude;
                    vm.long = position.coords.longitude;

                });
            }
            else {
                console.log('unable to fetch location')
            }
        },
        fetchRequests(){
            var vm = this;
            axios.get('/driver/fetch-request')
                .then(response => {
                    vm.requests = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
    mounted(){
        this.getLocation();
        this.fetchRequests();
    }
});
