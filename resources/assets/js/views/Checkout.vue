<template>
    <div>
        <div v-if="products.length === 0">
            <div class="text-center py-5 mt-5">
                <i class="material-icons" style="font-size: 6em;">remove_shopping_cart</i>
            </div>
            <p class="text-muted font-weight-bold pb-5" style="font-size: 2em;">Your Cart is Empyt</p>
        </div>
        <div v-else>
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
                            <th scope="row">{{index}}</th>
                            <td>{{product.title}}</td>
                            <td>Ksh. {{product.price}}</td>
                            <td>{{product.qty}}&nbsp;
                                <a href="#" class="badge badge-pill badge-secondary px-2">Remove&nbsp;
                                    <i class="material-icons" style="vertical-align: middle; font-size: 16px;">clear</i></a></td>
                            <td>{{product.price*product.qty}}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="border-bottom">Total Ksh: {{total}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <form class="text-left">
                        <div class="row">
                            <div class="col">
                                <input type="text" v-model="fname" class="form-control" placeholder="First name">
                            </div>
                            <div class="col">
                                <input type="text" v-model="lname" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" v-model="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">Phone Number</label>
                            <input type="text" class="form-control" v-model="phoneNumber" id="PhoneNumber" placeholder="Phone Number">
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" @click.prevent="handleCustomPayment" :disabled="!formIsValid">Widget Pay</button>
                            </div>
                            <div class="col text-right">
                                <a id="mula-checkout-button" @click.pevent="handlePayment" :disabled="!formIsValid"></a>
                                <!--<button class="btn btn-primary" v-on:click.prevent="onExpressPay" :disabled="!formIsValid">Redirect Pay</button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {getPaymentOptions} from '../utils'
export default {
  name: 'Checkout',
  mounted () {
    MulaCheckout.renderCheckoutButton()
  },
  data () {
    return {
      lname: '',
      fname: '',
      email: '',
      phoneNumber: ''
    }
  },
  computed: {
    products () {
      return this.$store.getters.cart
    },
    total () {
      let total = 0
      this.products.forEach(product => {
        total += (product.qty * product.price)
      })
      return total
    },
    formIsValid () {
      return true
      // return this.lname !== '' && this.fname !== '' && this.email !== '' && this.phoneNumber !== ''
    }
  },
  methods: {
    handleCustomPayment () {
      const params = {
        fname: this.fname,
        lname: this.lname,
        email: this.email,
        phone_number: this.phoneNumber,
        amount: this.total
      }
      getPaymentOptions(params)
    },
    handlePayment () {
      const params = {
        fname: this.fname,
        lname: this.lname,
        email: this.email,
        phone_number: this.phoneNumber,
        amount: this.total
      }
      MulaCheckout.renderCheckoutPage({
        checkoutType: 'modal',
        params: params,
        url: process.env.MIX_API_ROOT + '/express-pay'
      })
    }
  }
}
</script>
