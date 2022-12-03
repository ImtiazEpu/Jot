import Vue from 'vue';
import VueRouter from 'vue-router';
import ContactsCreate from "./views/ContactsCreate";
import ListComponent from "./components/ListComponent";
import ContactsShow from "./views/ContactsShow";
import ContactsEdit from "./views/ContactsEdit";
import ContactsIndex from "./views/ContactsIndex";
import BirthdaysIndex from "./views/BirthdaysIndex";
import Logout from "./components/Actions/Logout";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/', component: ListComponent,
            meta:{title:'Welcome'}
        }, {
            path: '/contacts', component: ContactsIndex,
            meta:{title:'Contacs'}
        }, {
            path: '/contacts/create', component: ContactsCreate,
            meta:{title:'Add New Contact'}
        }, {
            path: '/contacts/:id', component: ContactsShow,
            meta:{title:'Contact Details'}
        }, {
            path: '/contacts/:id/edit', component: ContactsEdit,
            meta:{title:'Edit Contact'}
        }, {
            path: '/birthdays', component: BirthdaysIndex,
            meta:{title:'This Month\'s Birthday'}
        },{
            path: '/logout', component: Logout
        },
    ],
    mode: 'history'
});
