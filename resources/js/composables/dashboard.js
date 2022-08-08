import { ref } from "vue";
import axios from "axios";

export default function useExpenses() {
    const maxexpense = ref([]);
    const minexpense = ref([]);
    const lastexpense = ref([]);
    const category = ref([]);

    const getMaxExpense = async () => {
        let response = await axios.get("/api/dashboard/maxExpense");
        maxexpense.value = response.data.data;
    };

    const getMinExpense = async () => {
        let response = await axios.get("/api/dashboard/minExpense");
        minexpense.value = response.data.data;
    };

    const getLastExpense = async () => {
        let response = await axios.get("/api/dashboard/lastExpense");
        lastexpense.value = response.data.data;
        category.value = response.data.data.category;
    };

    return {
        maxexpense,
        minexpense,
        lastexpense,
        category,
        getMaxExpense,
        getMinExpense,
        getLastExpense,
    };
}
