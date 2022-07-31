require("alpinejs");
import { createApp } from "vue";
import router from "./router";
import CategoriesIndex from "./components/categories/CategoriesComponent";

createApp({
    components: {
        CategoriesIndex,
    },
})
    .use(router)
    .mount("#app");
