import Vue from 'vue'

var app = new Vue({
    el: '#driver_root',
    data: {
        lat: '',
        long: ''
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
        }
    },
    mounted(){
        this.getLocation()
    }
});
