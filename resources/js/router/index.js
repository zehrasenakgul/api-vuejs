import { createRouter, createWebHistory } from "vue-router";

import CategoriesIndex from "../components/categories/CategoriesIndex";
import CategoriesCreate from "../components/categories/CategoriesCreate";
import CategoriesEdit from "../components/categories/CategoriesEdit";
import ExpensesIndex from "../components/expenses/ExpensesIndex";
import ExpensesCreate from "../components/expenses/ExpensesCreate";
import ExpensesEdit from "../components/expenses/ExpensesEdit";

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
    {
        path: "/expenses",
        name: "expenses.index",
        component: ExpensesIndex,
    },
    {
        path: "/expenses/create",
        name: "expenses.create",
        component: ExpensesCreate,
    },
    {
        path: "/expenses/:id/edit",
        name: "expenses.edit",
        component: ExpensesEdit,
        props: true,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
