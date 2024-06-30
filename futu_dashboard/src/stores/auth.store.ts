// store/auth.store.ts
import Module from 'module'
import AuthService from '../services/auth/auth.service'
import type { Action, Commit, Dispatch } from 'vuex/types/index.js'
import router from '@/router'
import axios from 'axios'

export interface AppAdmin {
  id: number
  name: string
  email: string
  password: string
  admin_role: string
  create_at: string
  updated_at: string
}

// Define the state interface
export interface AuthState {
  token: string | null
  admin: AppAdmin | null
}

export interface ActionContext {
  state: AuthState
  commit: Commit
  dispatch: Dispatch
}

const authModule: Module<AuthState, any> = {
  state: (): AuthState => ({
    token: localStorage.getItem('token') || null,
    admin: JSON.parse(localStorage.getItem('admin') || 'null')
  }),

  mutations: {
    SET_TOKEN(state: AuthState, token: string) {
      state.token = token
    },

    CLEAR_TOKEN(state: AuthState) {
      state.token = null
      state.admin = null
    },

    SET_ADMIN(state: AuthState, admin: AppAdmin) {
      state.admin = admin
    }
  },

  actions: {
    async login(context: ActionContext, admin: { email: string; password: string }) {
      try {
        const response = await new AuthService().login(admin)
        context.commit('SET_TOKEN', response.token)
        // console.log(response.status)
        if (response.status == 200) {
          try {
            let response = await axios.get(
              'http://localhost/futu_ecommerce/api/admins.php/admins',
              {
                params: { email: admin.email }
              }
            )
            if (response.data.status === 200) {
              let admin = response.data.data
              localStorage.setItem('admin', JSON.stringify(admin))
              context.commit('SET_ADMIN', admin)
              // console.log(admin)
            } else {
              console.error('Error:', response.data.message)
            }
            console.log(response)
          } catch (error) {
            console.error('Error fetching admin:', error)
          }
        }
        return response
      } catch (error) {
        console.error('Login error:', error)
        throw error
      }
    },

    async logout(context: ActionContext) {
      new AuthService().logout()
      // router.push({ name: 'signin' })
      context.commit('CLEAR_TOKEN')
    }

    // async SEND_ADMIN(context: ActionContext, email: string) {
    //   localStorage.setItem('admin', JSON.stringify(admin))
    //   context.commit('SET_ADMIN', admin)
    // },
    // async SEND_ADMIN(context: ActionContext, email: string) {}
  },

  getters: {
    isAuthenticated(state: AuthState): boolean {
      return state.token?.length > 0 ? true : false
    },
    getAdmin(state: AuthState): AppAdmin | null {
      return state.admin
    }
  }
}

export default authModule
