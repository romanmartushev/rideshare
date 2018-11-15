import Vue from 'vue';
import axios from 'axios';
import $Scriptjs from 'scriptjs';
import $ from 'jquery';
import 'bootstrap';
import VueLoading from 'vue-loading-overlay';

Vue.use(VueLoading);

var app = new Vue({
    el: '#driver_root',
    data: {
        lat: 0,
        long: 0,
        requests: [],
        errors: [],
        map: '',
        marker: '',
        pos: {},
        directionsService: '',
        directionsDisplay: '',
        mapHeight: {
            height: '70vh',
        },
        directionsHeight : {
            height: '0',
            width: '100%',
        },
        mapLoading: true,
    },
    components: {
        Loading: VueLoading
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
                vm.directionsService = new google.maps.DirectionsService();
                vm.directionsDisplay = new google.maps.DirectionsRenderer();
                vm.mapLoading = false;
                vm.map = new google.maps.Map(document.getElementById('map'), {zoom: 20, center: vm.pos});
                vm.directionsDisplay.setMap(vm.map);
                vm.directionsDisplay.setPanel(document.getElementById('directionsPanel'));
                vm.marker = new google.maps.Marker({position: vm.pos, map: vm.map});
            });
        },
        getDirections(destination_address){
            this.mapHeight.height = '40vh';
            this.directionsHeight.height = '30vh';
            $('#pills-tab a[href="#pills-home"]').tab('show');
            var vm = this;
            this.marker.setMap(null);
            var request = {
                origin: new google.maps.LatLng(vm.lat, vm.long),
                destination: destination_address,
                travelMode: 'DRIVING'
            };
            this.directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    vm.directionsDisplay.setDirections(result);
                    setTimeout(() => {
                        vm.directionsDisplay.map.setZoom(15);
                        vm.directionsDisplay.map.setCenter(vm.pos);
                    },100);
                }
            });
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
            }
        },
    },
    mounted() {
        var vm = this;
        $Scriptjs('https://maps.googleapis.com/maps/api/js?key=' + process.env.GOOGLE_MAPS_API_KEY, () => {
            vm.getLocation();
        });
        this.fetchRequests();
    }
});
