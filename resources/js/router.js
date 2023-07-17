import { createRouter, createWebHistory } from "vue-router";
const BASE_URL = "/";

import Home from "./components/Home.vue";
import Home2 from "./components/Home2.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/home2",
        name: "Home2",
        component: Home2,
    },
];

const router = createRouter({
    history: createWebHistory(BASE_URL), // set BASE_URL
    routes,
});

export default router;
