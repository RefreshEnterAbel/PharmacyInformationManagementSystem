<template>
  <div>
    <h3 class="text-3xl font-semibold text-gray-700">{{ $t('settings') }}</h3>

    <div class="mt-4">
      <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
        <template v-for="tab in tabs">
          <router-link active-class="bg-indigo-500"
                       :to="{ name: tab.route }"
                       :key="tab.route"
                       class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200
                       transform bg-gray-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
            <fa :icon="tab.icon" fixed-width/>
            {{ tab.name }}
          </router-link>
        </template>
      </div>
    </div>

    <div class="mt-4">
      <transition name="fade" mode="out-in">
        <router-view/>
      </transition>
    </div>
  </div>


</template>

<script>
export default {
  middleware: 'auth',

  computed: {
    tabs() {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
