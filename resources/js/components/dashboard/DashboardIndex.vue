<template>
  <div class="row gy-5">
    <div class="col">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <div
          class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
        >
          <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-black hover:btn-primary cursor-pointer">
              Maksimum Harcama Yapılan Ay
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th>Ay</th>
                  <th scope="col">Toplam Harcama Sayısı</th>
                  <th scope="col">Toplam Harcama</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ maxexpense.month }}</td>
                  <td>{{ maxexpense.count }}</td>
                  <td>{{ maxexpense.sums }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <div
          class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
        >
          <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-black hover:btn-primary cursor-pointer">
              Minimum Harcama Yapılan Ay
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th>Ay</th>
                  <th scope="col">Toplam Harcama Sayısı</th>
                  <th scope="col">Toplam Harcama</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ minexpense.month }}</td>
                  <td>{{ minexpense.count }}</td>
                  <td>{{ minexpense.sums }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row gy-5">
    <div class="col">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <div
          class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
        >
          <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-black hover:btn-primary cursor-pointer">
              En Son Yapılan Harcama Bilgisi
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ lastexpense.date }}</td>
                  <td>{{ lastexpense.amount }}</td>
                  <td>{{ lastexpense.spending }}</td>
                  <td>{{ category.name }}</td>
                </tr>
              </tbody>
            </table>
          </div>
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
    const {
      maxexpense,
      minexpense,
      lastexpense,
      category,
      getLastExpense,
      getMinExpense,
      getMaxExpense,
    } = useExpenses();

    onMounted(getMaxExpense);
    onMounted(getMinExpense);
    onMounted(getLastExpense);

    return {
      maxexpense,
      category,
      minexpense,
      lastexpense,
    };
  },
};
</script>
