<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#/">Mulla Pay</a>

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
                    <button class="btn btn-default" v-on:click.stop="onCheckout">
                        <i class="material-icons">shopping_cart</i>
                        <span class="badge badge-light">{{checkoutProductsCount}}</span>
                    </button>
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
  },
  methods: {
    onCheckout () {
      this.$router.push('/checkout')
    }
  }
}
</script>
