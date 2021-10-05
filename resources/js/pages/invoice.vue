<template>
  <div>
    <h3 class="text-3xl font-medium text-gray-700">
      Invoice
    </h3>
    <div class="mt-8"/>

    <div class="flex flex-col mt-8">
      <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg"
        >
          <table class="min-w-full">
            <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Name
              </th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
              >
                Expired Date
              </th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
              >
                Manufacture Date
              </th>
              <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase
               border-b border-gray-200 bg-gray-50">
                Number Of Items
              </th>
            </tr>
            </thead>

            <tbody class="bg-white">
            <tr v-for="(sale, index) in sales" :key="index"
                :class="(new Date(med.exp_date ).getTime() - new Date().getTime())<= 0? 'bg-red-500 text-white':'hover:bg-gray-200'">
              <td
                class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
              >
                {{ med.name }}
              </td>
              <td
                class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
              >
                  <span
                    class="inline-flex px-2 text-xs font-semibold leading-5   rounded-full"
                  > {{ med.exp_date }}</span>
              </td>

              <td
                class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
              >
                {{ med.manufacture_date }}
              </td>

              <td
                class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap"
              >
                {{ med.no_items }}
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
  name: "invoice",
  computed: {
    ...mapGetters({
      sales: `sales/sales`,
    })
  },
}
</script>

<style scoped>

</style>
