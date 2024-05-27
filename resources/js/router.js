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
    {
        path: '/user/:id',
        name: 'UserDetails',
        component: () => import("./components/User/UserDetails.vue"),
        props: true
      },

      {
        path: '/recipe/:id',
        name: 'RecipeDetails',
        component: () => import("./components/Recipe/RecipeDetails.vue"),
        props: true
      },
    
];

export default createRouter({
    history: createWebHistory(),
    routes,
});