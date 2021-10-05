<template>
  <div>
    <h3 class="text-3xl font-semibold text-gray-700">Sales Medicine</h3>

    <div class="mt-8">
      <div class="flex flex-col mt-3 sm:flex-row">
        <div class="flex">
          <div class="relative">
            <select
              class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
            >
              <option>5</option>
              <option>10</option>
              <option>20</option>
            </select>

            <div
              class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none"
            >
              <svg
                class="w-4 h-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
          <div class="relative">
            <select
              class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
            >
              <option>All</option>
              <option>Active</option>
              <option>Inactive</option>
            </select>

            <div
              class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none"
            >
              <svg
                class="w-4 h-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
        <div class="relative block mt-2 sm:mt-0">
          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg
              viewBox="0 0 24 24"
              class="w-4 h-4 text-gray-500 fill-current"
            >
              <path
                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"
              />
            </svg>
          </span>

          <input
            placeholder="Search"
            class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
          >
        </div>
        <div class="flex flex-1 justify-end w-full">
          <button
            class="px-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500"
            @click="show('sales')">
            Sale
          </button>
        </div>
      </div>
      <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
          <table class="min-w-full leading-normal">
            <thead>
            <tr>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Select
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Name
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Categories
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Drug Type
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Manufacture Company
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Manufacture Date
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Expired Date
              </th>

              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Dose Amount
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Price
              </th>
            </tr>
            </thead>
            <tbody>
            <template v-for="(medicine, index) in medicines">
              <tr :key="index"
                  :class="(new Date(medicine.exp_date ).getTime() - new Date().getTime())<= 0? 'bg-red-500 text-white':'bg-white hover:bg-gray-200'">
                <td class="px-5 py-5 text-sm border-b border-gray-200">
                  <input type="checkbox" :disabled="(new Date(medicine.exp_date ).getTime() - new Date().getTime())<= 0"
                         v-model="form.selected" :value="medicine.id"
                         class="text-indigo-600 border-2 rounded p-2">
                </td>
                <td class="px-5 py-5 border-b border-gray-200">
                  {{ medicine.name }}
                </td>
                <td class="px-5 py-5  border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.categories }}
                  </p>
                </td>
                <td class="px-5 py-5  border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.med_type }}
                  </p>
                </td>
                <td class="px-5 py-5 text-sm border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.med_company }}
                  </p>
                </td>
                <td class="px-5 py-5  border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.manufacture_date }}
                  </p>
                </td>
                <td class="px-5 py-5  border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.exp_date }}
                  </p>
                </td>
                <td class="px-5 py-5  border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.dose_amount }}
                  </p>
                </td>
                <td class="px-5 py-5 text-sm font-bold border-b border-gray-200">
                  <p class="text-gray-900 whitespace-nowrap">
                    {{ medicine.price }} BIRR
                  </p>
                </td>
              </tr>
            </template>

            </tbody>
          </table>
          <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
            <span class="text-xs text-gray-900 xs:text-sm">Showing 1 to 4 of 50 Entries</span>
            <div class="inline-flex mt-2 xs:mt-0">
              <button class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">
                Prev
              </button>
              <button class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-r hover:bg-gray-400">
                Next
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <modal name="sales"
           :width="800"
           height="auto"
           :clickToClose="false"
           :adaptive="true"
    >
      <div class="mt-4">
        <div class="p-6 bg-white rounded-md shadow-md">
          <h2 class="text-lg font-semibold text-gray-700 capitalize">
            Add Buyer Information
          </h2>

          <form @submit.prevent="submit">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div>
                <label class="text-gray-700">Patient Name</label>
                <input
                  v-model="form.patient_name"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text"
                >
              </div>
              <div>
                <label class="text-gray-700">Total Bill</label>
                <input v-model="form.bill"
                       :disabled="true"
                       class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                       type="number"
                >
              </div>
            </div>
            <div class="flex justify-end mt-4">
              <button
                @click="hide('add')"
                class="px-4 mx-4 py-2 rounded-md text-gray-800 bg-gray-300 hover:bg-gray-400">
                Close
              </button>
              <button
                class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                Sell
              </button>
            </div>
          </form>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
import Form from "vform";
import {mapGetters} from "vuex";

export default {
  name: "sell",
  data: () => ({
    form: new Form({
      patient_name: '',
      bill: 0.0,
      selected: [],
    }),
  }),
  computed: {
    ...mapGetters({
      medicines: `medication/medicines`,
      medicineTypes: `medication/medicineTypes`
    })
  },
  methods: {
    submit() {
      this.form.post('/api/add_sales').then((response) => {
        this.$modal.hide("sales")
        this.form.reset();
        this.addMedicine(response.data)
        this.editId = 0
      })
    },
    show(model) {
      if (this.form.selected.length > 0) {
        let bill = 0;
        this.form.selected.forEach(value => {
          bill += this.medicines.filter(m => m.id === value)[0]['price']
        })
        this.form.bill = bill
        this.$modal.show(model)
      }
    },
    hide(model) {
      this.$modal.hide(model)
    }
  }
}
</script>

<style scoped>

</style>
