<template>
    <div>
        <!-- The "Pay with mula" button needs to have the "mula-checkout-button" class -->
        <a id="mula-checkout-button"></a>
    </div>
</template>
<script>
import * as MulaCheckout from 'MulaCheckout'
export default {
  name: 'ExpressPayment',
  data () {
    return {
      msg: ''
    }
  },
  mounted () {
    const merchantURL = 'http://localhost:8000/api/v1/express-pay'
    const params = sessionStorage.getItem('expressPayData')

    MulaCheckout.renderCheckoutButton()

    document.getElementById('mula-checkout-button').addEventListener('click', function () {
      MulaCheckout.renderCheckoutPage({
        checkoutType: 'redirect',
        params: params,
        url: merchantURL
      })
    })
  }
}
</script>
