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
    const categoryByYear = ref([]);

    const getMaxExpense = async () => {
        let response = await axios.get("/api/dashboard/maxExpense");
        maxexpense.value = response.data;
    };

    const getMinExpense = async () => {
        let response = await axios.get("/api/dashboard/minExpense");
        minexpense.value = response.data;
    };

    const getLastExpense = async () => {
        let response = await axios.get("/api/dashboard/lastExpense");
        lastexpense.value = response.data;
        category.value = response.data.category;
    };

    const getexpensesThisMonth = async () => {
        let response = await axios.get("/api/dashboard/expensesThisMonth");
        expensesThisMonth.value = response.data;
    };

    const getTotalExpenseThisMonth = async () => {
        let response = await axios.get("/api/dashboard/totalExpenseThisMonth");
        totalExpenseThisMonth.value = response.data;
    };

    const getSpendingRepeat = async () => {
        let response = await axios.get("/api/dashboard/spendingRepeat");
        spendingRepeat.value = response.data;
        let yearsList = await axios.get("/api/dashboard/years");
        years.value = yearsList.data;
    };

    const getExpensesThisYear = async () => {
        let response = await axios.get("/api/dashboard/expensesThisYear");
        expensesThisYear.value = response.data;
    };

    const getTotalExpenseThisYear = async () => {
        let response = await axios.get("/api/dashboard/totalExpenseThisYear");
        totalExpenseThisYear.value = response.data;
    };

    const getByMonthYear = async () => {
        let response = await axios.get("/api/dashboard/byMonthYear");
        byMonthYear.value = response.data;
    };
    const getCategoryByYear = async () => {
        let response = await axios.get("/api/dashboard/categoryByYear");
        categoryByYear.value = response.data;
    };

    return {
        maxexpense,
        minexpense,
        lastexpense,
        expensesThisMonth,
        expensesThisYear,
        category,
        years,
        categoryByYear,
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
        getCategoryByYear,
    };
}
