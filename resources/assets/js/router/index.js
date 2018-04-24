/**
 * Created by joram on 4/23/18.
 */
import Vue from 'vue'
import Router from 'vue-router'
import Products from '../views/Products.vue'
import Checkout from '../views/Checkout.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Products',
      component: Products
    },
    {
      path: '/checkout',
      name: 'Checkout',
      component: Checkout
    }
  ]
})