require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let Appheader = require('./components/Appheader.vue');
let Appfooter = require('./components/Appfooter.vue');

let Add = require('./components/Add.vue');

let Home = require('./components/Home.vue');
let About = require('./components/About.vue');

const routes = [
    { path: '/home', component: Home },
    { path: '/about', component: About }
  ]
  
  const router = new VueRouter({
    //mode: 'history', 
    routes
  })


const app = new Vue({
    el: '#app',
    router,
    components: {Appheader, Appfooter, Add},
    created(){
      //
    }
});
