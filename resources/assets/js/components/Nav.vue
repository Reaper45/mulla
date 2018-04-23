<template>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <router-link class="navbar-brand" :to="{name: 'Products'}">Mulla Pay</router-link>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Shop <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="float-right">
                <div v-if="!authenticated">
                    <button class="btn btn-primary">Login</button>
                    <button class="btn btn-secondary">Register</button>
                </div>
                <div v-else>
                    <router-link class="btn btn-light" :to="{name: 'Checkout'}">
                        <i class="material-icons" style="vertical-align: middle;">shopping_cart</i>
                        <span class="badge badge-light">{{checkoutProductsCount}}</span>
                    </router-link>
                </div>

            </div>
        </div>
    </nav>
</template>
<script>
export default {
  name: 'Nav',
  data () {
    return {
      authenticated: true
    }
  },
  computed: {
    checkoutProductsCount () {
      return this.$store.getters.checkoutProductsCount
    }
  }
}
</script>
