require("bootstrap");
require("alpinejs");
import { createApp } from "vue";
import router from "./router";
import CategoriesIndex from "./components/categories/CategoriesIndex";
import ExpensesIndex from "./components/expenses/ExpensesIndex";

createApp({
    components: {
        CategoriesIndex,
    },
    components: {
        ExpensesIndex,
    },
})
    .use(router)
    .mount("#app");
