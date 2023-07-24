import { createRouter, createWebHistory } from "vue-router";
const BASE_URL = "/";

import Home from "./components/Home.vue";
import Login from "./components/Login.vue";
import Singup from "./components/Singup.vue";
import Edit from "./components/Edit.vue";
const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/singup",
        name: "SingUp",
        component: Singup,
    },
    {
        path: "/edit/",
        name: "Edit",
        component: Edit,
    },

];

const router = createRouter({
    history: createWebHistory(BASE_URL), // set BASE_URL
    routes,
});

export default router;
