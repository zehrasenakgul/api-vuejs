<template>
  <div class="row">
    <div class="col-md-6">
      <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
          <div class="px-4 py-2 text-black hover:btn-primary cursor-pointer">
            Total Expense List By Month This Year
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th>Month</th>
                <th scope="col">Total Number of Expenses</th>
                <th scope="col">Total Expense Amount</th>
              </tr>
            </thead>
            <tbody>
              <template v-for="(item, index) in expenses">
                <tr>
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ item.month }}</td>
                  <td>{{ item.count }}</td>
                  <td>{{ item.sums }}</td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import useExpenses from "../../composables/dashboard";
import { onMounted } from "vue";

export default {
  setup() {
    const { expenses, getExpenses } = useExpenses();

    onMounted(getExpenses);

    return {
      expenses,
    };
  },
};
</script>
