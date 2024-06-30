import axios from 'axios'
import { createStore } from 'vuex'
import type { Commit, Dispatch } from 'vuex/types/index.js'
import authModule from './auth.store'
// import { ActionContext } from 'vuex'
interface Category {
  id: number
  name: string
  archive?: string
}

interface Admin {
  id: number
  name: string
  email: string
  password: string
  address?: string
  image?: string
}

interface State {
  categories: Category[]
  superAdmin: Admin
  admin: Admin
}

interface CustomActionContext {
  state: State
  commit: Commit
  dispatch: Dispatch
}

const store = createStore<State>({
  state: {
    categories: [],
    superAdmin: {},
    admin: {}
  },
  mutations: {
    // categories
    setCategories(state: State, payload: Category[]) {
      state.categories = payload
    },

    // admins
    setSuperAdmin(state: State, payload: Admin) {
      state.superAdmin = payload
    },
    setAdmin(state: State, payload: Admin) {
      state.admin = payload
    }
  },
  actions: {
    // categories
    // async getAllCategories(context: CustomActionContext) {
    //   try {
    //     let response = await axios.get(
    //       'http://localhost/futu_ecommerce/api/categories.php/categories'
    //     )
    //     if (response.status == 200) {
    //       let data = await response.data['data']
    //       console.log(response)
    //       context.commit('setCategories', data)
    //     } else {
    //       console.error('Failed to fetch categories:', response.statusText)
    //     }
    //   } catch (error) {
    //     console.error('Error fetching categories:', error)
    //   }
    // }
    // admins
    // async getAllAdmins(context: CustomActionContext) {
    //   try {
    //     let response = await axios.get('http://localhost/futu_ecommerce/index.php/admins')
    //     if (response.status == 200) {
    //       let superAdmin = await response.data['data'][0]
    //       let admin = await response.data['data'][1]
    //       console.log(superAdmin)
    //       console.log(admin)
    //       context.commit('setSuperAdmin', superAdmin)
    //       context.commit('setAdmin', admin)
    //     } else {
    //       console.error('Failed to fetch admins:', response.statusText)
    //     }
    //   } catch (error) {
    //     console.error('Error fetching admins:', error)
    //   }
    // }
  },
  getters: {},
  modules: {
    auth: authModule
  }
})

export default store
