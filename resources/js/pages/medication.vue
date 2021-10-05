<template>
  <div>
    <h3 class="text-3xl font-medium text-gray-700">
      Medication List
    </h3>
    <div class="mt-8">
      <div class="flex flex-col mt-3 sm:flex-row">
        <div class="flex">
          <div class="relative">
            <select v-model="limit_by" class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border
            border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
              <option>5</option>
              <option>10</option>
              <option>20</option>
              <option>50</option>
              <option>100</option>
            </select>

            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
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
              class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
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

          <input placeholder="Search" v-model="searchKey"
                 class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b
                  border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white
                  focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
        </div>
        <div class="flex flex-1 justify-start my-2 md:my-0 md:justify-end w-full">
          <button class="px-4 py-2 md:py-0 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform
           bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500"
                  @click="show('add')">
            Add
          </button>
        </div>
      </div>
      <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
          <table class="min-w-full leading-normal">
            <thead>
            <tr>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100
                 border-b-2 border-gray-200">
                Name
              </th>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100
              border-b-2 border-gray-200">
                Categories
              </th>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100
              border-b-2 border-gray-200">
                Drug Type
              </th>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2
              border-gray-200">
                Manufacture Company
              </th>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100
               border-b-2 border-gray-200">
                Manufacture Date
              </th>
              <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase
               bg-gray-100 border-b-2 border-gray-200">
                Expired Date
              </th>

              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
              >
                Dose Amount
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                Price
              </th>
              <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                Action
              </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(medicine, index) in filterMedicines" :key="index">
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                {{ medicine.name }}
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.categories }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.med_type }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.med_company }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.manufacture_date }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.exp_date }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.dose_amount }}
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <p class="text-gray-900 whitespace-nowrap">
                  {{ medicine.price }} BIRR
                </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <div class="flex flex-column">
                  <button
                    @click="del(medicine.id)"
                    class="relative z-10 block p-2 text-white transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    Delete
                  </button>
                  <button
                    @click="edit(medicine.id)"
                    class="relative mx-2 z-10 block p-2 text-white transition-colors duration-200 transform bg-yellow-400 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    Edit
                  </button>
                  <button
                    class="relative mx-2 z-10 block p-2 text-white transition-colors duration-200 transform bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    View
                  </button>
                </div>
              </td>
            </tr>
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
    <modal name="add"
           :scrollable="true"
           :width="900"
           height="auto"
           :clickToClose="false">
      <div class="mt-4">
        <div class="p-6 bg-white rounded-md shadow-md">
          <h2 class="text-lg font-semibold text-gray-700 capitalize">
            {{ editId === 0 ? 'Add' : 'Updated' }} Medication
          </h2>

          <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div>
                <label class="text-gray-700">Name</label>
                <input
                  v-model="form.name"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text"
                >
                <has-error :form="form" field="name"/>
              </div>

              <div>
                <label class="text-gray-700">Generic Name</label>
                <input
                  v-model="form.generic_name"
                  :class="{ 'is-invalid': form.errors.has('generic_name') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text">
                <has-error :form="form" field="generic_name"/>
              </div>

              <div>
                <label class="text-gray-700">Categories</label>
                <select v-model="form.categories"
                        :class="{ 'is-invalid': form.errors.has('categories') }"
                        class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                  <option>General Sales List</option>
                  <option>Pharmacy Medicines</option>
                  <option>Prescription Only Medicines</option>
                  <option>Controlled Drugs</option>
                </select>
                <has-error :form="form" field="categories"/>
              </div>
              <div>
                <label class="text-gray-700">Medicine Types</label>
                <select v-model="form.type_id"
                        :class="{ 'is-invalid': form.errors.has('type_id') }"
                        class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                  <template v-for="types in medicineTypes">
                    <option :value="types.id">{{ types.name }}</option>
                  </template>
                </select>
                <has-error :form="form" field="type_id"/>
              </div>

              <div>
                <label class="text-gray-700">Manufacture Date</label>
                <input
                  v-model="form.manufacture_date"
                  :class="{ 'is-invalid': form.errors.has('manufacture_date') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="date">
                <has-error :form="form" field="manufacture_date"/>
              </div>

              <div>
                <label class="text-gray-700">Made Company</label>
                <input
                  v-model="form.med_company"
                  :class="{ 'is-invalid': form.errors.has('med_company') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text"
                >
                <has-error :form="form" field="med_company"/>
              </div>

              <div>
                <label class="text-gray-700">Expired Date</label>
                <input
                  v-model="form.exp_date"
                  :class="{ 'is-invalid': form.errors.has('exp_date') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="date"
                >
                <has-error :form="form" field="exp_date"/>
              </div>
              <div>
                <label class="text-gray-700">Price</label>
                <input
                  v-model="form.price"
                  :class="{ 'is-invalid': form.errors.has('price') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text"
                >
                <has-error :form="form" field="price"/>
              </div>

              <div>
                <label class="text-gray-700">Number Of Items</label>
                <input
                  v-model="form.no_items"
                  :class="{ 'is-invalid': form.errors.has('no_items') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="number">
                <has-error :form="form" field="no_items"/>
              </div>
              <div>
                <label class="text-gray-700">Dose Amount</label>
                <input
                  v-model="form.dose_amount"
                  :class="{ 'is-invalid': form.errors.has('dose_amount') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text">
                <has-error :form="form" field="dose_amount"/>
              </div>

            </div>

            <div class="grid grid-cols-1 mt-4">
              <div>
                <label class="text-gray-700">Shelf Number</label>
                <input
                  v-model="form.shelf_no"
                  :class="{ 'is-invalid': form.errors.has('shelf_no') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text">
                <has-error :form="form" field="shelf_no"/>
              </div>
              <div>
                <label class="text-gray-700">Prescription</label>
                <textarea
                  v-model="form.prescription"
                  :class="{ 'is-invalid': form.errors.has('prescription') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                </textarea>
                <has-error :form="form" field="prescription"/>
              </div>
            </div>

            <div class="flex justify-end mt-4">
              <button
                type="reset"
                @click="hide('add')"
                class="px-4 mx-4 py-2 rounded-md text-gray-800 bg-gray-300 hover:bg-gray-400">
                Close
              </button>
              <Button
                :form="form"
                class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                Save
              </Button>
            </div>
          </form>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
import Form from 'vform'
import {mapActions, mapGetters} from "vuex";
import Swal from "sweetalert2";

export default {
  name: 'Medication',
  data: () => ({
    form: new Form({
      name: '',
      generic_name: '',
      categories: '',
      type_id: '',
      manufacture_date: '',
      med_company: '',
      price: 5,
      exp_date: '',
      dose_amount: '',
      no_items: '',
      prescription: '',
      shelf_no: '',
    }),
    filterMedicines: [],
    limit_by: 10,
    default_limit: 4,
    editId: 0,
    searchKey: '',
    filterBy: 0,
  }),
  created() {
    this.load()
  },
  computed: {
    ...mapGetters({
      medicines: `medication/medicines`,
      medicineTypes: `medication/medicineTypes`
    })
  },
  watch: {
    searchKey: function (val) {
      this.filterMedicines = this.medicines.filter((medicine) => {
        return (medicine['name'].toLowerCase().includes(val.toLowerCase()) ||
          medicine['med_company'].toLowerCase().includes(val.toLowerCase()) ||
          medicine['categories'].toLowerCase().includes(val.toLowerCase()) ||
          medicine['med_type'].toLowerCase().includes(val.toLowerCase()) ||
          medicine['generic_name'].toLowerCase().includes(val.toLowerCase())
        )
      })
    }
  },
  methods: {
    ...mapActions(`medication`, [`fetchMedicines`, `fetchMedicineTypes`, `addMedicine`]),
    async load() {
      this.filterMedicines = this.medicines
    },
    submit() {
      if (this.editId === 0) {
        this.form.post('/api/add_medicine').then((response) => {
          this.$modal.hide("add")
          this.form.reset();
          this.addMedicine(response.data)
          this.editId = 0
        })
      } else {
        this.form.patch(`/api/update_medicine/${this.editId}`).then((response) => {
          this.$modal.hide("add")
          this.form.reset();
          this.editId = 0
        })
      }

    },
    async edit(id) {
      let medicine = this.filterMedicines.find(m => {
        return m.id === id
      })
      this.form.keys().forEach(key => {
        this.form[key] = medicine[key]
      })
      this.editId = id
      this.show('add');
    },
    async del(id) {
      Swal.fire({
        icon: 'warning',
        title: 'Are Went to Delete A Medicine?',
        reverseButtons: true,
        confirmButtonText: this.$t('ok'),
        cancelButtonText: 'Cancel'
      }).then(() => {

      })
    },
    simple_toggle(defaultLimit, filtersLength) {
      this.limit_by = (this.limit_by === defaultLimit) ? filtersLength : defaultLimit
    },
    show(model) {
      this.$modal.show(model)
    },
    hide(model) {
      this.$modal.hide(model)
    }
  }
}
</script>

<style scoped>

</style>
