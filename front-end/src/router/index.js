import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ServiceView from '../views/ServiceView'
import SignInView from '../views/SignInView'
import SignUpView from '../views/SignUpView'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/service',
    name: 'service',
    component: ServiceView
  },
  {
    path: '/signIn',
    name: 'signIn',
    component: SignInView
  },
  {
    path: '/signUp',
    name: 'signUp',
    component: SignUpView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
