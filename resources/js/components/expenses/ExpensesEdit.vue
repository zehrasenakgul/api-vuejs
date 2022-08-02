<template>
  <div v-if="errors" v-for="(v, k) in errors" :key="k">
    <div
      class="alert alert-light text-red-600"
      v-for="error in v"
      :key="error"
      role="alert"
    >
      {{ error }}
    </div>
  </div>
  <form class="space-y-6" v-on:submit.prevent="saveExpense">
    <div class="space-y-4 rounded-md shadow-sm mb-3">
      <div class="mb-3">
        <label for="name" class="block text-sm font-medium text-gray-700"
          >Spending Amount</label
        >
        <div class="mt-1">
          <input
            type="text"
            name="amount"
            id="amount"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            v-model="expense.amount"
          />
        </div>
      </div>

      <div class="mb-3">
        <label for="spending" class="block text-sm font-medium text-gray-700"
          >Spent Place</label
        >
        <div class="mt-1">
          <input
            type="text"
            name="spending"
            id="spending"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            v-model="expense.spending"
          />
        </div>
      </div>
      <div class="mb-3">
        <label for="category_id" class="block text-sm font-medium text-gray-700"
          >Select Category</label
        >

        <select
          name="category_id"
          v-model="expense.category_id"
          class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        >
          <option
            v-for="(item, index) in categories"
            :key="item.id"
            v-bind:value="item.id"
          >
            {{ item.name }}
          </option>
        </select>

        <div class="mt-1"></div>
      </div>
      <div class="mb-3">
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <div class="mt-1">
          <input
            type="date"
            name="date"
            id="date"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            v-model="expense.date"
          />
        </div>
      </div>
    </div>

    <button
      type="submit"
      class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
    >
      Save
    </button>
  </form>
</template>

<script>
import useCategories from "../../composables/categories";
import useExpenses from "../../composables/expenses";
import { onMounted } from "vue";
export default {
  props: {
    id: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { categories, getCategories } = useCategories();
    onMounted(getCategories);

    const { errors, expense, getExpense, updateExpense } = useExpenses();

    onMounted(getExpense(props.id));

    const saveExpense = async () => {
      await updateExpense(props.id);
    };

    return {
      errors,
      expense,
      saveExpense,
      categories,
    };
  },
};
</script>
