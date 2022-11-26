import Vue from 'vue';
import VueRouter from 'vue-router';
import ContactCreate from "./views/ContactCreate";
import ListComponent from "./components/ListComponent";
import ContactsShow from "./views/ContactsShow";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {path: '/', component: ListComponent},
        {path: '/contacts/create', component: ContactCreate},
        {path: '/contacts/:id', component: ContactsShow}
    ],
    mode: 'history'
});
