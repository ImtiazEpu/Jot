import Vue from "vue";
import router from "./router";
import App from "./components/App";
import VueSweetalert2 from "vue-sweetalert2";
Vue.use(VueSweetalert2);
require('./bootstrap');

const app = new Vue({
    el: '#app',
    components:{
        App
    },
    router
});
