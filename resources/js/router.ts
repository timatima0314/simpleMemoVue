import { createRouter, createWebHistory } from "vue-router";
const BASE_URL = "/";

import Home from "./components/Home.vue";
import Login from "./components/Login.vue";

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
];

const router = createRouter({
    history: createWebHistory(BASE_URL), // set BASE_URL
    routes,
});

export default router;
