require("bootstrap");
require("alpinejs");
import { createApp } from "vue";
import router from "./router";
import CategoriesIndex from "./components/categories/CategoriesIndex";
import ExpensesIndex from "./components/expenses/ExpensesIndex";
import DashboardIndex from "./components/dashboard/DashboardIndex";

createApp({
    components: {
        CategoriesIndex,
        ExpensesIndex,
        DashboardIndex,
    },
})
    .use(router)
    .mount("#app");
