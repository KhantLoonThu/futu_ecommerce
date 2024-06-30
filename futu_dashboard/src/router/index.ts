import { createRouter, createWebHistory } from 'vue-router'
import store from '@/stores'

import SigninView from '@/views/Authentication/SigninView.vue'
// import SignupView from '@/views/Authentication/SignupView.vue'
import CalendarView from '@/views/CalendarView.vue'
import BasicChartView from '@/views/Charts/BasicChartView.vue'
import ECommerceView from '@/views/Dashboard/ECommerceView.vue'
import FormElementsView from '@/views/Forms/FormElementsView.vue'
import FormLayoutView from '@/views/Forms/FormLayoutView.vue'
import SettingsView from '@/views/Pages/SettingsView.vue'
import ProfileView from '@/views/ProfileView.vue'
import TablesView from '@/views/TablesView.vue'
import AlertsView from '@/views/UiElements/AlertsView.vue'
import ButtonsView from '@/views/UiElements/ButtonsView.vue'

// category
import CategoryView from '@/views/Categories/CategoryView.vue'
import CreateCategory from '@/views/Categories/CreateCategory.vue'
// import CategoryView from '@/views/CategoryView.vue'

const routes = [
  {
    path: '/',
    name: 'eCommerce',
    component: ECommerceView,
    meta: {
      title: 'Dashboard',
      requiresAuth: true
    }
  },
  {
    path: '/signin',
    redirect: '/login'
  },
  {
    path: '/login',
    name: 'signin',
    component: SigninView,
    meta: {
      title: 'Login'
    }
  },
  {
    path: '/category',
    name: 'category',
    component: CategoryView,
    meta: {
      title: 'Category',
      requiresAuth: true
    }
  },
  {
    path: '/category/create',
    name: 'category-create',
    component: CreateCategory,
    meta: {
      title: 'Create Category',
      requiresAuth: true
    }
  },
  {
    path: '/calendar',
    name: 'calendar',
    component: CalendarView,
    meta: {
      title: 'Calendar'
    }
  },
  {
    path: '/profile',
    name: 'profile',
    component: ProfileView,
    meta: {
      title: 'Profile'
    }
  },
  {
    path: '/forms/form-elements',
    name: 'formElements',
    component: FormElementsView,
    meta: {
      title: 'Form Elements'
    }
  },
  {
    path: '/forms/form-layout',
    name: 'formLayout',
    component: FormLayoutView,
    meta: {
      title: 'Form Layout'
    }
  },
  {
    path: '/tables',
    name: 'tables',
    component: TablesView,
    meta: {
      title: 'Tables'
    }
  },
  {
    path: '/pages/settings',
    name: 'settings',
    component: SettingsView,
    meta: {
      title: 'Settings'
    }
  },
  {
    path: '/charts/basic-chart',
    name: 'basicChart',
    component: BasicChartView,
    meta: {
      title: 'Basic Chart'
    }
  },
  {
    path: '/ui-elements/alerts',
    name: 'alerts',
    component: AlertsView,
    meta: {
      title: 'Alerts'
      // requiresAuth: true
    }
  },
  {
    path: '/ui-elements/buttons',
    name: 'buttons',
    component: ButtonsView,
    meta: {
      title: 'Buttons'
    }
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { left: 0, top: 0 }
  }
})

// router.beforeEach((to, from, next) => {
//   if (to.meta.title) {
//     document.title = `${to.meta.title} | Futu Dashboard`
//   } else {
//     document.title = 'Futu Dashboard' // Fallback title if meta.title is not set
//   }

//   const isAuthenticated: boolean = authModule.getters.isAuthenticated

//   if (to.meta.requiresAuth && !isAuthenticated) {
//     next({ name: 'signin' })
//   } else if (to.name === 'signin' && isAuthenticated) {
//     next('/')
//   } else {
//     next()
//   }
// })
router.beforeEach((to, from, next) => {
  // console.log('Navigating to:', to.name)

  const isAuthenticated: boolean = store.getters.isAuthenticated
  // console.log('Is authenticated:', isAuthenticated)

  if (to.meta.requiresAuth && !isAuthenticated) {
    console.log('Requires authentication but not authenticated. Redirecting to signin.')
    next({ name: 'signin' })
  } else if (to.name === 'signin' && isAuthenticated) {
    console.log('Already authenticated. Redirecting to /.')
    next('/')
  } else {
    console.log('Allowing navigation.')
    next()
  }
  // if (to.meta.requiresAuth && !isAuthenticated) {
  //   next({ name: 'signin' })
  // } else if (to.name === 'signin' && isAuthenticated) {
  //   next('/')
  // } else {
  //   next()
  // }
})

// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.requiresAuth)) {
//     if (!store.state.isAuthenticated) {
//       next({ name: 'Login' })
//     } else {
//       next()
//     }
//   } else {
//     next()
//   }
// })

export default router
