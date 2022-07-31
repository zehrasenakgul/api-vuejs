import { createRouter, createWebHistory } from "vue-router";

import CategoriesIndex from "../components/categories/CategoriesIndex";
import CategoriesCreate from "../components/categories/CategoriesCreate";
import CategoriesEdit from "../components/categories/CategoriesEdit";

const routes = [
    {
        path: "/categories",
        name: "categories.index",
        component: CategoriesIndex,
    },
    {
        path: "/categories/create",
        name: "categories.create",
        component: CategoriesCreate,
    },
    {
        path: "/categories/:id/edit",
        name: "categories.edit",
        component: CategoriesEdit,
        props: true,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
