/**
 * Created by joram on 4/19/18.
 */
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    user: { id: 'argdfbdy', name: '' },
    products: [
      { id: '0', title: 'Iphone x', price: 1050 },
      { id: '1', title: 'Macbook pro', price: 1550 },
      { id: '2', title: 'Sumsung x', price: 1500 },
      { id: '3', title: 'HP Pavilion', price: 2550 },
      { id: '4', title: 'Sony HD TV', price: 15500 },
      { id: '5', title: 'Tesla Model 3', price: 20550 },
      { id: '6', title: 'BMW i8', price: 10550 },
      { id: '7', title: 'Bentley Continental', price: 15050 }
    ],
    cart: []
  },
  mutations: {
    addToCart (state, payload) {
      if (!payload.productInCart) {
        state.cart.push({...payload.product, qty: 1})
      } else {
        state.cart.forEach((product) => {
          if (product.id === payload.product.id) {
            product.qty++
          }
        })
      }
    }
  },
  actions: {
    onAddToCart ({commit, state}, payload) {
      let productId = payload
      const loadProduct = (productId) => {
        return state.products.find((product) => {
          return product.id === productId
        })
      }
      let cartProduct = loadProduct(productId)

      const prodInCart = (cartProduct) => {
        return state.cart.find((product) => {
          return product.id === cartProduct
        })
      }
      commit('addToCart', {product: cartProduct, productInCart: prodInCart(cartProduct.id)})
    }
  },
  getters: {
    products (state) {
      return state.products
    },
    checkoutProductsCount (state) {
      return state.cart.length
    },
    cart (state) {
      return state.cart
    }
  }
})
