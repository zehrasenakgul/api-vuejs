import { ref } from "vue";
import axios from "axios";

export default function useExpenses() {
    const expenses = ref([]);

    const getExpenses = async () => {
        let response = await axios.get("/api/dashboard");
        expenses.value = response.data;
    };

    return {
        expenses,
        getExpenses,
    };
}
