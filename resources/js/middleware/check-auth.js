import store from '~/store'

export default async (to, from, next) => {
  if (!store.getters['auth/check'] && store.getters['auth/token']) {
    try {
      await store.dispatch('auth/fetchUser')
      await store.dispatch('medication/fetchMedicines')
      await store.dispatch('medication/fetchMedicineTypes')
      await store.dispatch('sales/fetchSales')
    } catch (e) { }
  }

  next()
}
