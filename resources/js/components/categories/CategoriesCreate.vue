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
  <form class="space-y-6" @submit.prevent="saveCategory">
    <div class="space-y-4 rounded-md shadow-sm mb-3">
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">İsim</label>
        <div class="mt-1">
          <input
            type="text"
            name="name"
            id="name"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            v-model="form.name"
          />
        </div>
      </div>
    </div>

    <button
      type="submit"
      class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
    >
      Kaydet
    </button>
  </form>
</template>

<script>
import { reactive } from "vue";
import useCategories from "../../composables/categories";

export default {
  setup() {
    const form = reactive({
      name: "",
    });

    const { errors, storeCategory } = useCategories();

    const saveCategory = async () => {
      await storeCategory({ ...form });
    };

    return {
      form,
      errors,
      saveCategory,
    };
  },
};
</script>
