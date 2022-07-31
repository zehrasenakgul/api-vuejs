import { createRouter, createWebHistory } from "vue-router";

import CategoriesComponent from "../components/categories/CategoriesComponent";

const routes = [
    {
        path: "/dashboard",
        name: "categories.index",
        component: CategoriesComponent,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
