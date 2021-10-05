<template>
  <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
    <div class="flex justify-center items-center">
      <span class="text-gray-700 font-semibold text-2xl text-center">Pharmacy Information Management System(PIMS)</span>
    </div>

    <form class="mt-4" @submit.prevent="login" @keydown="form.onKeydown($event)">
      <!-- Email -->
      <div class="mb-3">
        <label class="block">
          <span class="text-gray-700 text-sm">{{ $t("email") }}</span>
          <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email"
                 autocomplete="email"
                 class=" mt-1 block w-full border-2 rounded-md focus:border-indigo-600"
          >
          <has-error :form="form" field="email"/>
        </label>
        <!-- Password -->
        <label class="block mt-3">
          <span class="text-gray-700 text-sm">{{ $t("password") }}</span>
          <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" type="password"
                 name="password" autocomplete="current-password"
                 class="mt-1 block w-full border-2 rounded-md focus:border-indigo-600"
          >
          <has-error :form="form" field="password"/>
        </label>

        <div class="flex justify-between items-center mt-4">
          <!-- Remember Me -->
          <div>
            <label class="inline-flex items-center">
              <input v-model="remember" type="checkbox" class="text-indigo-600 border-2 rounded p-2">
              <span class="mx-2 text-gray-600 text-sm">
                {{ $t("remember_me") }}</span>
            </label>
          </div>

          <div>
            <router-link :to="{ name: 'password.request' }"
                         class="block text-sm fontme text-indigo-700 hover:underline"
            >
              {{ $t("forgot_password") }}
            </router-link>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
          <Button :form="form"
                  class=" py-3 px-4 bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500 justify-center"
          >
            {{ $t("login") }}
          </Button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Form from 'vform'
import Cookies from 'js-cookie'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  components: {
    LoginWithGithub
  },
  layout: 'basic',

  middleware: 'guest',

  metaInfo() {
    return {title: this.$t('login')}
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {
    async login() {
      // Submit the form.
      const {data} = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.redirect()
    },

    redirect() {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({path: intendedUrl})
      } else {
        this.$router.push({name: 'home'})
      }
    }
  }
}
</script>
