<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <div class="flex place-content-end mb-4">
      <div class="px-4 py-2 text-white btn btn-dark hover:btn-primary cursor-pointer">
        <router-link :to="{ name: 'expenses.create' }" class="text-sm font-medium"
          >Harcama Ekle</router-link
        >
      </div>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tarih</th>
            <th scope="col">Harcama Miktarı</th>
            <th scope="col">Harcanan Yer</th>
            <th scope="col">Kategori</th>
            <th scope="col">Düzenle</th>
            <th scope="col">Sil</th>
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
                  Düzenle
                </router-link>
              </td>
              <td width="60">
                <button
                  @click="deleteExpense(item.id)"
                  class="inline-flex items-center px-4 py-2 btn btn-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >
                  Sil
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
      if (!window.confirm("Emin Misin?")) {
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
