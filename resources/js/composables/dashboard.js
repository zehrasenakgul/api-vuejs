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
        let response = await axios.get("/api/dashboard/getMaxExpense");
        maxexpense.value = response.data.data;
    };

    const getMinExpense = async () => {
        let response = await axios.get("/api/dashboard/getMinExpense");
        minexpense.value = response.data.data;
    };

    const getLastExpense = async () => {
        let response = await axios.get("/api/dashboard/getLastExpense");
        lastexpense.value = response.data.data;
        category.value = response.data.data.category;
    };

    const getexpensesThisMonth = async () => {
        let response = await axios.get("/api/dashboard/getExpensesThisMonth");
        expensesThisMonth.value = response.data.data;
    };

    const getTotalExpenseThisMonth = async () => {
        let response = await axios.get(
            "/api/dashboard/getTotalExpenseThisMonth"
        );
        totalExpenseThisMonth.value = response.data.data;
    };

    const getSpendingRepeat = async () => {
        let response = await axios.get("/api/dashboard/getSpendingRepeat");
        spendingRepeat.value = response.data.data;
        let yearsList = await axios.get("/api/dashboard/getYears");
        years.value = yearsList.data.data;
    };

    const getExpensesThisYear = async () => {
        let response = await axios.get("/api/dashboard/getExpensesThisYear");
        expensesThisYear.value = response.data.data;
    };

    const getTotalExpenseThisYear = async () => {
        let response = await axios.get(
            "/api/dashboard/getTotalExpenseThisYear"
        );
        totalExpenseThisYear.value = response.data.data;
    };

    const getByMonthYear = async () => {
        let response = await axios.get("/api/dashboard/getExpensesByMonthYear");
        byMonthYear.value = response.data.data;
    };
    const getCategoryByYear = async () => {
        let response = await axios.get("/api/dashboard/getCategoryByYear");
        categoryByYear.value = response.data.data;
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
