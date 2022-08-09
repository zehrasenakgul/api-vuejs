import { ref } from "vue";
import axios from "axios";

export default function useExpenses() {
    const maxexpense = ref([]);
    const minexpense = ref([]);
    const lastexpense = ref([]);
    const category = ref([]);
    const expensesThisMonth = ref([]);
    const expensesThisYear = ref([]);
    const spendingRepeat = ref([]);
    const totalExpenseThisMonth = ref([]);
    const totalExpenseThisYear = ref([]);
    const years = ref([]);
    const byMonthYear = ref([]);

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

    const getexpensesThisMonth = async () => {
        let response = await axios.get("/api/dashboard/expensesThisMonth");
        expensesThisMonth.value = response.data.data;
    };

    const getTotalExpenseThisMonth = async () => {
        let response = await axios.get("/api/dashboard/totalExpenseThisMonth");
        totalExpenseThisMonth.value = response.data.data;
    };

    const getSpendingRepeat = async () => {
        let response = await axios.get("/api/dashboard/spendingRepeat");
        spendingRepeat.value = response.data;
        let yearsList = await axios.get("/api/dashboard/years");
        years.value = yearsList.data.data;
    };

    const getExpensesThisYear = async () => {
        let response = await axios.get("/api/dashboard/expensesThisYear");
        expensesThisYear.value = response.data.data;
    };

    const getTotalExpenseThisYear = async () => {
        let response = await axios.get("/api/dashboard/totalExpenseThisYear");
        totalExpenseThisYear.value = response.data.data;
    };

    const getByMonthYear = async () => {
        let response = await axios.get("/api/dashboard/byMonthYear");
        byMonthYear.value = response.data;
    };

    return {
        maxexpense,
        minexpense,
        lastexpense,
        expensesThisMonth,
        expensesThisYear,
        category,
        years,
        spendingRepeat,
        totalExpenseThisMonth,
        totalExpenseThisYear,
        byMonthYear,
        getMaxExpense,
        getMinExpense,
        getLastExpense,
        getexpensesThisMonth,
        getSpendingRepeat,
        getTotalExpenseThisMonth,
        getTotalExpenseThisYear,
        getExpensesThisYear,
        getByMonthYear,
    };
}
