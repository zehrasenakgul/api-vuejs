import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useExpenses() {
    const expenses = ref([]);
    const expense = ref([]);
    const router = useRouter();
    const errors = ref("");

    const getExpenses = async () => {
        let response = await axios.get("/api/expenses");
        expenses.value = response.data.data;
    };

    const getExpense = async (id) => {
        let response = await axios.get("/api/expenses/" + id);
        expense.value = response.data.data;
    };

    const storeExpense = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/expenses", data);
            await router.push({ name: "expenses.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const updateExpense = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/expenses/" + id, expense.value);
            await router.push({ name: "expenses.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyExpense = async (id) => {
        await axios.delete("/api/expenses/" + id);
    };

    return {
        expenses,
        expense,
        errors,
        getExpenses,
        getExpense,
        storeExpense,
        updateExpense,
        destroyExpense,
    };
}
