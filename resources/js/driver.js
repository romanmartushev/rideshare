import Vue from 'vue'
import axios from 'axios';
import $Scriptjs from 'scriptjs';

var app = new Vue({
    el: '#driver_root',
    data: {
        lat: 0,
        long: 0,
        requests: [],
        errors: []
    },
    methods: {
        getLocation() {
            if (navigator.geolocation) {
                this.initMap();
            }
            else {
                console.log('unable to fetch location')
            }
        },
        fetchRequests() {
            var vm = this;
            axios.get('/fetch-request')
                .then(response => {
                    vm.requests = response.data;
                })
                .catch(error => {
                    vm.errors = error.response.data;
                });
        },
        initMap() {
            var map;
            var vm = this;
            navigator.geolocation.getCurrentPosition(function (position) {
                // Get the coordinates of the current position.
                vm.lat = position.coords.latitude;
                vm.long = position.coords.longitude;
                // The location of Uluru
                var uluru = {lat: vm.lat, lng: vm.long};
                // The map, centered at Uluru
                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 8, center: uluru});
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({position: uluru, map: map});
            });
        }
    },
    mounted() {
        var vm = this;
        $Scriptjs('https://maps.googleapis.com/maps/api/js?key=' + process.env.GOOGLE_MAPS_API_KEY, () => {
            vm.getLocation();
        });
        this.fetchRequests();
    }
});
