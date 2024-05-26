import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/Home.vue"),
    },
    {
        path: "/users",
        component: () => import("./Pages/Users.vue"),
    },
    {
        path: "/recipes",
        component: () => import("./Pages/Recipes.vue"),
    },
    {
        path: "/groceries",
        component: () => import("./Pages/Groceries.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});