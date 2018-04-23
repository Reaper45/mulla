import Vue from 'vue'
import router from './router'
import {store} from './store'
import App from './App.vue'
import VueResource from 'vue-resource'
import './bootstrap';
// window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

Vue.use(VueResource)

const app = new Vue({
  el: '#app',
  components: { App },
  template: '<App/>',
  router,
  store
});
