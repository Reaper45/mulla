import Vue from 'vue'
import router from './router'
import {store} from './store'
import App from './App.vue'
import VueResource from 'vue-resource'
import './bootstrap';

Vue.use(VueResource)

const app = new Vue({
  el: '#app',
  components: { App },
  template: '<App/>',
  router,
  store
});
