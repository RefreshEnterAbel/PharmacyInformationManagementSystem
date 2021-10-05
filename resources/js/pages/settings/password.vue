<template>
  <div class="p-6 bg-white rounded-md shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 capitalize">
      {{ $t('your_password') }}
    </h2>

    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('password_updated')"/>
      <div class="grid grid-cols-1 mt-4">
        <div>
          <label class="text-gray-700">{{ $t('new_password') }}</label>
          <input
            v-model="form.password"
            :class="{ 'is-invalid': form.errors.has('password') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text"
          />
          <has-error :form="form" field="password"/>
        </div>
        <div>
          <label class="text-gray-700">{{ $t('confirm_password') }}</label>
          <input
            v-model="form.password_confirmation"
            :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
            class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text"
          />
          <has-error :form="form" field="password_confirmation"/>
        </div>
      </div>

      <div class="flex justify-end mt-4">
        <Button :form="form"
                class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
          {{ $t('update') }}
        </Button>
      </div>
    </form>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  scrollToTop: false,

  metaInfo() {
    return {title: this.$t('settings')}
  },

  data: () => ({
    form: new Form({
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    async update() {
      await this.form.patch('/api/settings/password')
      this.form.reset()
    }
  }
}
</script>
