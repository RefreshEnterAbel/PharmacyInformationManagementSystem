import axios from 'axios'
import * as types from '../mutation-types'
import {SAVE_MEDICINES_TYPES} from "../mutation-types";

// state
export const state = {
  medicines: [],
  medicineTypes: [],
}

// getters
export const getters = {
  medicines: state => state.medicines,
  medicineTypes: state => state.medicineTypes,
}

// mutations
export const mutations = {
  [types.ADD_MEDICINE](state, {medicine}) {
    state.medicines.push(medicine);
  },
  [types.SAVE_MEDICINES](state, {medicines}) {
    medicines.forEach(value => {
      state.medicines.push(value)
    })
  },
  [types.UPDATE_MEDICINE](state, {medicines}) {
    // todo update
  },
  [types.SAVE_MEDICINES_TYPES](state, {types}) {
    types.forEach(value => {
      state.medicineTypes.push(value)
    })
  },
}

// actions
export const actions = {

  async fetchMedicines({commit}) {
    if (state.medicines.length === 0) {
      await axios.get('/api/medicines').then((response) => {
        commit(types.SAVE_MEDICINES, response.data)
      })
    }
  },
  addMedicine({commit}, payload) {
    commit(types.ADD_MEDICINE, payload)
  },

  async fetchMedicineTypes({commit, state}) {
    if (state.medicineTypes.length === 0) {
      await axios.get('/api/medicines_types').then((response) => {
        commit(types.SAVE_MEDICINES_TYPES, response.data)
      })
    }

  },


}
