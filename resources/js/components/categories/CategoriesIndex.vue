<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <div class="flex place-content-end mb-4">
      <div class="px-4 py-2 text-white btn btn-dark hover:btn-primary cursor-pointer">
        <router-link :to="{ name: 'categories.create' }" class="text-sm font-medium"
          >Kategori Ekle</router-link
        >
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">İsim</th>
          <th scope="col">Düzenle</th>
          <th scope="col">Sil</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="(item, index) in categories" :key="item.id">
          <tr>
            <td scope="row" width="40">{{ index + 1 }}</td>

            <td>{{ item.name }}</td>
            <td width="60">
              <router-link
                :to="{
                  name: 'categories.edit',
                  params: { id: item.id },
                }"
                class="mr-2 inline-flex items-center px-4 py-2 btn btn-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
              >
                Düzenle
              </router-link>
            </td>
            <td width="60">
              <button
                @click="deleteCategory(item.id)"
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
</template>

<script>
import useCategories from "../../composables/categories";
import { onMounted } from "vue";

export default {
  setup() {
    const { categories, getCategories, destroyCategory } = useCategories();

    onMounted(getCategories);

    const deleteCategory = async (id) => {
      if (!window.confirm("Are you sure?")) {
        return;
      }

      await destroyCategory(id);
      await getCategories();
    };

    return {
      categories,
      deleteCategory,
    };
  },
};
</script>
