<template>
  <div>
    <h3 class="text-3xl font-medium text-gray-700">
      Dashboard
    </h3>

    <div class="mt-4">
      <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
          <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
              <fa class="w-8 h-8 text-white" size="2x" :icon="['fa','briefcase-medical']"/>
            </div>
            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                {{ medicines.length }}
              </h4>
              <div class="text-gray-500">
                Available Storage Medicine
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
          <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
              <fa class="w-8 h-8 text-white" size="2x" :icon="['fa','chart-bar']"/>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                10
              </h4>
              <div class="text-gray-500">
                Sales Of Day
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
          <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-gray-600 bg-opacity-75 rounded-full">
              <fa class="w-8 h-8 text-white" size="2x" :icon="['fa','chart-area']"/>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                10
              </h4>
              <div class="text-gray-500">
                Sale Of Month
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4">
      <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm"
          >
            <div class="p-3 bg-yellow-600 bg-opacity-75 rounded-full">
              <fa class="fa-h-16 text-white" size="2x" :icon="['fa','bell-slash']"/>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                {{ medicines.filter(m => m.no_items <= 10).length }}
              </h4>
              <div class="text-gray-500">
                Stock Shortage(10 & below)
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm"
          >
            <div class="p-3 bg-red-900 bg-opacity-75 rounded-full">
              <fa class="w-8 h-8 fa-w-16 text-white" size="2x" :icon="['fa','bolt']"/>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                {{
                  medicines.filter(m => (new Date(m.exp_date).getTime() / (1000 * 60 * 60 * 24 * 150)) >= (new Date().getTime() / (1000 * 60 * 60 * 24))).length
                }}
              </h4>
              <div class="text-gray-900">
                Nearly Expiry
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm"
          >
            <div class="p-3 bg-red-500 rounded-full">
              <fa class="w-8 h-8 text-white" size="2x" :icon="['fa','exclamation-circle']"/>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                {{ medicines.filter(m => (new Date(m.exp_date).getTime() - new Date().getTime()) <= 0).length }}
              </h4>
              <div class="text-gray-500">
                Expired Medicine
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
            <tr v-for="(med, index) in medicines" :key="index"
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
// import axios from 'axios'
import {mapGetters} from "vuex";

export default {
  middleware: 'auth',

  metaInfo() {
    return {title: this.$t('home')}
  },
  computed: {
    ...mapGetters({
      medicines: `medication/medicines`,
    })
  },
}
</script>
