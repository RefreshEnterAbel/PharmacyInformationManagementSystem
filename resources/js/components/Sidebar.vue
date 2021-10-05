<template>
  <div>
    <div
      :class="sidebarOpen ? 'block' : 'hidden'"
      class="
        fixed
        z-20
        inset-0
        bg-black
        opacity-50
        transition-opacity
        lg:hidden
      "
      @click="$store.dispatch('auth/showSidebar',false)"
    />
    <div
      :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in' "
      class="
        fixed
        z-30
        h-full
        inset-y-0
        left-0
        w-64
        transition
        duration-300
        transform
        bg-gray-900
        overflow-y-auto
        lg:translate-x-0 lg:static lg:inset-0
      "
    >
      <div class="flex items-center justify-center mt-8">
        <Logo/>
      </div>

      <nav class="mt-10">
        <template v-for="list in sidebarLists">
          <router-link
            exact-active-class="bg-gray-700 bg-opacity-25 border-l-4"
            class="
            flex
            items-center
            mt-4
            py-2
            px-6
            text-gray-500
            hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
          " :to="{name: list.path}">
            <fa class="w-8 h-8" size="lg" :icon="list.icon"/>
            <span class="mx-3">{{ list.title }}</span>
          </router-link>
        </template>

      </nav>
    </div>
  </div>
</template>

<script>
import Logo from './Logo'
import {mapGetters} from "vuex";

export default {
  name: 'Sidebar',
  components: {Logo},
  computed: {
    ...mapGetters({
      sidebarOpen: 'auth/sidebarOpen'
    }),
    sidebarLists() {
      return [
        {
          title: 'DashBoard',
          icon: ['fa', 'chart-pie'],
          path: 'home'
        },
        {
          title: 'Medication',
          icon: ['fa', 'briefcase-medical'],
          path: 'medication'
        },
        {
          title: 'Sales Medicine',
          icon: ['fa', 'cart-plus'],
          path: 'sales.medicine'
        },
        {
          title: 'Invoice',
          icon: ['fa', 'receipt'],
          path: 'invoice'
        },
        {
          title: 'Staff',
          icon: ['fa', 'hospital-user'],
          path: 'Staff'
        },
        {
          title: 'Pharmacy Info',
          icon: ['fa', 'capsules'],
          path: 'pharmacy'
        },
        {
          title: 'Settings',
          icon: ['fa', 'cog'],
          path: 'settings.profile'
        }
      ]
    }
  }
}
</script>

<style scoped>


</style>
