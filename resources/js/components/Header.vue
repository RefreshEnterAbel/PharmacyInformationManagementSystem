<template>
  <header
    class=" flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
      <button class="text-gray-500 focus:outline-none lg:hidden"
              @click="$store.dispatch('auth/showSidebar',true)"
      >
        <svg
          class="h-6 w-6"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M4 6H20M4 12H20M4 18H11"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>

      <div class="relative mx-4 lg:mx-0">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
          <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path
              d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>

        <input
          class="
            form-input
            w-32
            sm:w-64
            border-2
            rounded-md
            pl-10
            pr-4
            focus:border-indigo-600
          "
          type="text"
          placeholder="Search"
        >
      </div>
    </div>

    <div class="flex items-center">
      <div class="relative">
        <button
          class="flex mx-4 text-gray-600 focus:outline-none"
          @click="notificationOpen = !notificationOpen"
        >
          <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>

        <div
          v-show="notificationOpen"
          class="fixed inset-0 h-full w-full z-10"
          @click="notificationOpen = false"
        />

        <div
          v-show="notificationOpen"
          class="
            absolute
            right-0
            mt-2
            w-80
            bg-white
            rounded-lg
            shadow-xl
            overflow-hidden
            z-10
          "
          style="width: 20rem"
        >
          <a
            href="#"
            class="
              flex
              items-center
              px-4
              py-3
              text-gray-600
              hover:text-white
              hover:bg-indigo-600
              -mx-2
            "
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
              alt="avatar"
            >
            <p class="text-sm mx-2">
              <span class="font-bold" href="#">Sara Salah</span> replied on the
              <span class="font-bold text-indigo-400" href="#">Upload Image</span>
              artical . 2m
            </p>
          </a>
          <a
            href="#"
            class="
              flex
              items-center
              px-4
              py-3
              text-gray-600
              hover:text-white
              hover:bg-indigo-600
              -mx-2
            "
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
              alt="avatar"
            >
            <p class="text-sm mx-2">
              <span class="font-bold" href="#">Slick Net</span> start following
              you . 45m
            </p>
          </a>
          <a
            href="#"
            class="
              flex
              items-center
              px-4
              py-3
              text-gray-600
              hover:text-white
              hover:bg-indigo-600
              -mx-2
            "
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
              alt="avatar"
            >
            <p class="text-sm mx-2">
              <span class="font-bold" href="#">Jane Doe</span> Like Your reply
              on
              <span class="font-bold text-indigo-400" href="#">Test with TDD</span>
              artical . 1h
            </p>
          </a>
          <a
            href="#"
            class="
              flex
              items-center
              px-4
              py-3
              text-gray-600
              hover:text-white
              hover:bg-indigo-600
              -mx-2
            "
          >
            <img
              class="h-8 w-8 rounded-full object-cover mx-1"
              src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
              alt="avatar"
            >
            <p class="text-sm mx-2">
              <span class="font-bold" href="#">Abigail Bennett</span> start
              following you . 3h
            </p>
          </a>
        </div>
      </div>

      <div v-if="user" class="relative">
        <button
          class=" relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none "
          @click="dropdownOpen = !dropdownOpen"
        >
          <img :src="user.photo_url" class="rounded-circle profile-photo me-1">
        </button>

        <div
          v-show="dropdownOpen"
          class="fixed inset-0 h-full w-full z-10"
          @click="dropdownOpen = false"
        />

        <div
          v-show="dropdownOpen" class=" absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
          <router-link class=" block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white"
                       :to="{ name: 'settings.profile' }">
            <fa icon="cog" fixed-width/>
            {{ $t('settings') }}
          </router-link>
          <a href="#" class=" block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white "
             @click.prevent="logout">
            <fa icon="sign-out-alt" fixed-width/>
            {{ $t('logout') }}
          </a>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  name: 'Header',
  data: () => ({
    appName: window.config.appName,
    dropdownOpen: false,
    notificationOpen: false
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      await this.$router.push({name: 'login'})
    }
  }
}
</script>

<style></style>
