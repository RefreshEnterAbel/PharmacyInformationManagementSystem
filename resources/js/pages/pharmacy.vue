<template>
  <div>
    <h3 class="text-3xl font-semibold text-gray-700">Pharmacy Information</h3>
    <div class="mt-4">
      <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 capitalize">
          Edit
        </h2>
        <form>
          <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
              <label class="text-gray-700">Pharmacy Name</label>
              <input
                v-model="form.name"
                :class="{ 'is-invalid': form.errors.has('name') }"
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text"
              />
              <has-error :form="form" field="name"/>
            </div>

            <div>
              <label class="text-gray-700">Pharmacy Location</label>
              <input
                v-model="form.location"
                :class="{ 'is-invalid': form.errors.has('location') }"
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text"
              />
              <has-error :form="form" field="address"/>
            </div>

          </div>
          <div class="grid grid-cols-1 mt-4">
            <div>
              <label class="text-gray-700">Address</label>
              <textarea
                v-model="form.address"
                :class="{ 'is-invalid': form.errors.has('address') }"
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                </textarea>
              <has-error :form="form" field="address"/>
            </div>
          </div>

          <div class="flex justify-end mt-4">
            <Button
              :form="form"
              class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
              Save
            </Button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";

export default {
  name: "pharmacy",
  data: () => ({
    form: new Form({
      name: '',
      location: '',
      address: ''
    })
  }),
}
</script>

<style scoped>

</style>
