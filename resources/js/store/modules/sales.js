import axios from 'axios'
import * as types from '../mutation-types'
import {SAVE_MEDICINES_TYPES} from "../mutation-types";

// state
export const state = {
  sales: [],
}

// getters
export const getters = {
  sales: state => state.sales,
}

// mutations
export const mutations = {
  [types.SAVE_SALES](state, {sales}) {
    sales.forEach(value => {
      state.sales.push(value)
    })
  },
}

// actions
export const actions = {

  async fetchSales({commit}) {
    await axios.get('/api/sales').then((response) => {
      commit(types.SAVE_SALES, response.data)
    })
  },
}
