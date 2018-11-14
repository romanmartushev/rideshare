import Vue from 'vue'
import axios from 'axios';
import $Scriptjs from 'scriptjs';

var app = new Vue({
    el: '#driver_root',
    data: {
        lat: 0,
        long: 0,
        requests: [],
        errors: [],
        map: '',
        marker: '',
        pos: {}
    },
    methods: {
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
        getLocation() {
            if (navigator.geolocation) {
                this.initMap();
            }
            else {
                console.log('unable to fetch location')
            }
        },
        initMap() {
            var vm = this;
            navigator.geolocation.getCurrentPosition(function (position) {
                // Get the coordinates of the current position.
                vm.lat = position.coords.latitude;
                vm.long = position.coords.longitude;
                //Get Location
                vm.pos = {lat: vm.lat, lng: vm.long};
                // The map, centered at pos
                vm.map = new google.maps.Map(document.getElementById('map'), {zoom: 20, center: vm.pos});
                // The marker, positioned at pos
                vm.marker = new google.maps.Marker({position: vm.pos, map: vm.map});
            });
            console.log('Lat:'+this.lat,'Long:'+this.long);
        },
        updateMap(){
            if (navigator.geolocation) {
                var vm = this;
                navigator.geolocation.getCurrentPosition(function (position) {
                    vm.lat = position.coords.latitude;
                    vm.long = position.coords.longitude;
                    vm.pos = {lat: vm.lat, lng: vm.long};
                });
                this.map.setCenter(this.pos);
                console.log('Lat:'+this.lat,'Long:'+this.long);
            }
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
