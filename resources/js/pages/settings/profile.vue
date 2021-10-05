<template>
  <div class="p-6 bg-white rounded-md shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 capitalize">
      {{ $t('your_info') }}
    </h2>

    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')"/>
      <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
        <div>
          <label class="text-gray-700">First Name</label>
          <input
            v-model="form.first_name"
            :class="{ 'is-invalid': form.errors.has('first_name') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text"
          />
          <has-error :form="form" field="first_name"/>
        </div>
        <div>
          <label class="text-gray-700">Last Name</label>
          <input
            v-model="form.last_name"
            :class="{ 'is-invalid': form.errors.has('last_name') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text"
          />
          <has-error :form="form" field="last_name"/>
        </div>

        <div>
          <label class="text-gray-700">Email Address</label>
          <input
            v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="email"
          />
          <has-error :form="form" field="email"/>
        </div>
        <div>
          <label class="text-gray-700">Phone Number</label>
          <input
            v-model="form.phone_number" :class="{ 'is-invalid': form.errors.has('phone_number') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="tel"
          />
          <has-error :form="form" field="phone_number"/>
        </div>
        <div>
          <label class="text-gray-700">Gender</label>
          <select v-model="form.gender"
                  :class="{ 'is-invalid': form.errors.has('gender') }"
                  class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
            <option>Male</option>
            <option>Female</option>
          </select>
          <has-error :form="form" field="gender"/>
        </div>
        <div>
          <label class="text-gray-700">Address</label>
          <input
            v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text"
          />
          <has-error :form="form" field="address"/>
        </div>
      </div>
      <div class="grid grid-cols-1 mt-4">
        <div>
          <label class="text-gray-700">Biography</label>
          <textarea
            v-model="form.biography"
            :class="{ 'is-invalid': form.errors.has('biography') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"/>
          <has-error :form="form" field="biography"/>
        </div>
      </div>

      <div class="flex justify-end mt-4">
        <Button
          :form="form"
          class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
        >
          {{ $t('update') }}
        </Button>
      </div>
    </form>
  </div>
</template>

<script>
import Form from 'vform'
import {mapGetters} from 'vuex'

export default {
  scrollToTop: false,

  metaInfo() {
    return {title: this.$t('settings')}
  },

  data: () => ({
    form: new Form({
      first_name: '',
      last_name: '',
      email: '',
      phone_number: '',
      gender: '',
      address: '',
      biography: '',
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created() {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key]
    })
  },

  methods: {
    async update() {
      const {data} = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', {user: data})
    }
  }
}
</script>
