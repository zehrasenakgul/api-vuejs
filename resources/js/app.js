require("bootstrap");
require("alpinejs");
import { createApp } from "vue";
import router from "./router";
import CategoriesIndex from "./components/categories/CategoriesIndex";

createApp({
    components: {
        CategoriesIndex,
    },
})
    .use(router)
    .mount("#app");
