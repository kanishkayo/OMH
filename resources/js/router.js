import Vue from "vue";
import Router from "vue-router";

import Landing from './components/Landing'
import USERREG from "./components/ADMIN/userRegistration"
import USER from "./components/ADMIN/user"
import SERVICE from "./components/ADMIN/service"
import CUSTOMER from "./components/ADMIN//customer"
import HOME from "./components/ADMIN/home";
import PHARMACY from "./components/PARMACY/userprofile";
import ORDER from "./components/PARMACY/oderList";


const routes = [
    {
        path: "/",
        component: Landing
    },


    {
        path:"/pharmacy/dashboard/userRegistration",
        component: USERREG
    },

    {
        path:"/pharmacy/dashboard/user",
        component: USER
    },




    {
        path:"/pharmacy/dashboard/service",
        component: SERVICE
    },

    {
        path:"/pharmacy/dashboard/customer",
        component: CUSTOMER
    },
    {
        path:"/pharmacy/dashboard/home",
        component: HOME
    },

    {
        path:"/pharmacy/dashboard/pharmacy",
        component: PHARMACY
    },

    {
        path:"/pharmacy/dashboard/order",
        component: ORDER
    },



];

Vue.use(Router);

export default new Router({
    state: {
        userIsAuthorized: true,
    },
    mode: "history",
    routes
});
