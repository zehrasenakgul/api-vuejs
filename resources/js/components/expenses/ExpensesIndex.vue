<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <div class="flex place-content-end mb-4">
      <div class="px-4 py-2 text-white btn btn-dark hover:btn-primary cursor-pointer">
        <router-link :to="{ name: 'expenses.create' }" class="text-sm font-medium"
          >Create Expense</router-link
        >
      </div>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Spending Amount</th>
            <th scope="col">Spent Place</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="(item, index) in expenses" :key="item.id">
            <tr>
              <td scope="row">{{ index + 1 }}</td>
              <td>{{ item.date }}</td>
              <td>{{ item.amount }}</td>
              <td>{{ item.spending }}</td>
              <td>{{ item.category }}</td>

              <td width="60">
                <router-link
                  :to="{
                    name: 'expenses.edit',
                    params: { id: item.id },
                  }"
                  class="mr-2 inline-flex items-center px-4 py-2 btn btn-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >
                  Edit
                </router-link>
              </td>
              <td width="60">
                <button
                  @click="deleteExpense(item.id)"
                  class="inline-flex items-center px-4 py-2 btn btn-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >
                  Delete
                </button>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import useExpenses from "../../composables/expenses";
import { onMounted } from "vue";

export default {
  setup() {
    const { expenses, getExpenses, destroyExpense } = useExpenses();

    onMounted(getExpenses);

    const deleteExpense = async (id) => {
      if (!window.confirm("Are you sure?")) {
        return;
      }

      await destroyExpense(id);
      await getExpenses();
    };

    return {
      expenses,
      deleteExpense,
    };
  },
};
</script>
