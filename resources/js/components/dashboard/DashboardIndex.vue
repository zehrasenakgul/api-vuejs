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
                  <td>
                    {{ isMonth(maxexpense.month) }}
                  </td>
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
                  <td>{{ isMonth(minexpense.month) }}</td>
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
                  <td>{{ isDate(lastexpense.date) }}</td>
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
  <div class="row gy-5">
    <div class="col">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <div
          class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
        >
          <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-black hover:btn-primary cursor-pointer">
              Bu Ay Yapılan Harcamalar <br />
              Bu Ay Yapılan Toplam Harcama : {{ totalExpenseThisMonth.sums }}
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
                  <th>Kategori</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in expensesThisMonth" :key="item.id">
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ isDate(item.date) }}</td>
                  <td>{{ item.amount }}</td>
                  <td>{{ item.spending }}</td>
                  <td>{{ item.category.name }}</td>
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
              Harcama Yerleri Tekrarı
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 mb-2" v-for="year in years">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: 600">{{ year.year }}</li>
                <template v-for="item in spendingRepeat">
                  <template v-for="index in item">
                    <li class="list-group-item" v-if="index.year === year.year">
                      {{ index.spending }}-{{ index.count }}
                    </li>
                  </template>
                </template>
              </ul>
            </div>
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
              Ay/Yıl Bazında Yapılan Harcamalar
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-2" v-for="year in years">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: 600">{{ year.year }}</li>
                <template v-for="item in byMonthYear">
                  <template v-for="index in item">
                    <li class="list-group-item" v-if="index.year === year.year">
                      Ay: {{ isMonth(index.month) }} <br />
                      Toplam Harcama Miktarı: {{ index.sums }} <br />
                       Toplam Harcama Sayısı: {{ index.count }}
                    </li>
                  </template>
                </template>
              </ul>
            </div>
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
              Bu Yıl Yapılan Harcamalar<br />
              Bu Yıl Yapılan Toplam Harcama :
              {{ totalExpenseThisYear.sums }}
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
                  <th>Kategori</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in expensesThisYear" :key="item.id">
                  <td scope="row"><i class="fa fa-circle-dot"></i></td>
                  <td>{{ isDate(item.date) }}</td>
                  <td>{{ item.amount }}</td>
                  <td>{{ item.spending }}</td>
                  <td>{{ item.category.name }}</td>
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
import moment from "moment";
import "moment/locale/tr";
export default {
  methods: {
    isMonth(date) {
      const month = moment(date, "MM").format("MMMM");
      return month;
    },
    isDate(date) {
      const month = moment(date).format("DD/MM/YYYY");
      return month;
    },
  },
  setup() {
    const {
      maxexpense,
      minexpense,
      lastexpense,
      expensesThisMonth,
      category,
      byMonthYear,
      years,
      expensesThisYear,
      spendingRepeat,
      totalExpenseThisMonth,
      totalExpenseThisYear,
      getLastExpense,
      getMinExpense,
      getMaxExpense,
      getexpensesThisMonth,
      getSpendingRepeat,
      getTotalExpenseThisMonth,
      getTotalExpenseThisYear,
      getExpensesThisYear,
      getByMonthYear,
    } = useExpenses();

    onMounted(getMaxExpense);
    onMounted(getMinExpense);
    onMounted(getLastExpense);
    onMounted(getexpensesThisMonth);
    onMounted(getSpendingRepeat);
    onMounted(getTotalExpenseThisMonth);
    onMounted(getTotalExpenseThisYear);
    onMounted(getExpensesThisYear);
    onMounted(getByMonthYear);
    return {
      maxexpense,
      category,
      minexpense,
      spendingRepeat,
      expensesThisMonth,
      years,
      byMonthYear,
      expensesThisYear,
      lastexpense,
      totalExpenseThisMonth,
      totalExpenseThisYear,
    };
  },
};
</script>
