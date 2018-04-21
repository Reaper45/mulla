<template>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, index) in products" v-bind:key="index">
                        <th scope="row">{{num++}}</th>
                        <td>{{product.title}}</td>
                        <td>{{product.price}}</td>
                        <td>{{product.qty}}&nbsp;
                            <a href="#" class="badge badge-pill badge-secondary px-2">Remove&nbsp;
                                <i class="material-icons" style="vertical-align: middle; font-size: 16px;">clear</i></a></td>
                        <td>{{product.price*product.qty}}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td class="border-bottom">{{total}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <form class="text-left">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Redirect</button>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary">Widget</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
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
    },
    total () {
      return 100000
    }
  }
}
</script>
