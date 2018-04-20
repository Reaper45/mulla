<template>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(product, index) in products" v-bind:key="index">
                <th scope="row">{{num++}}</th>
                <td>{{product.title}}</td>
                <td>{{product.price}}</td>
                <td>{{product.qty}}</td>
                <td>{{product.price*product.qty}}</td>
                <td><button class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
  name: 'Checkout',
  data () {
    return {
      num: 1
    }
  },
  computed: {
    products () {
      return this.$store.getters.cart
    }
  }
}
</script>
