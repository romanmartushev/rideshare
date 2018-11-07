import Vue from 'vue'
import * as uiv from 'uiv'
import axios from 'axios'

Vue.use(uiv);

var app = new Vue({
   el:"#app",
   data:{
       time: new Date(),
       date: null
   },
    methods:{

    }
});
