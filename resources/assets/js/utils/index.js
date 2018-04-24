/**
 * Created by joram on 4/23/18.
 */
import axios from 'axios'

const auth_url = 'https://beep2.cellulant.com:9001/CheckoutV2/checkoutPublicAPI/oauth/token'
const initiate_payment_url = 'https://beep2.cellulant.com:9001/CheckoutV2/checkoutPublicAPI/api/transaction'

const headers = token => {
  return {
    Accepts: 'application/json',
    Authorization: token.token_type + ' ' + token.access_token
  }
}

export const authenticate = (next) => {
  const data = {
    grant_type: 'client_credentials',
    client_id: process.env.MIX_CLIENT_ID,
    client_secret: process.env.MIX_CLIENT_SECRET
  }
  axios.post(auth_url, data)
    .then(response => {
      next(response.data)
    })
    .catch(error => {
      console.log(error)
    })
}

export const getPaymentOptions = () => {
  let client_code = process.env.MIX_MULLA_SERVICE_CODE
  let country = 'UG'
  let language = 'en'

  const payment_options_url = 'https://beep2.cellulant.com:9001/CheckoutV2/checkoutPublicAPI/api/payment/options/'+client_code+'?countryCode='+country+'&languageCode='+language

  authenticate(function (token) {
    axios.get(payment_options_url, {headers: headers(token)})
      .then(response => {
        console.log(response.data)
      })
      .catch(error => {
        console.log(error)
      })
  })
}

const initiatePayment = transaction => {

  const data = {
    MSISDN: transaction.phone_number,
    payerClientCode: 'MPESA',
    serviceCode: process.env.MIX_MULLA_SERVICE_CODE,
    countryCode: 'KE',
    transactionReferenceID: '1001',
    paymentOptionCode: 'Mobile Money',
    paymentMode: 'STK Push',
    currencyCode: 'KES',
    amount: transaction.amount,
    accountNumber: process.env.MIX_PAY_BILL,
    language: 'en',
  }

  axios.post(initiate_payment_url, data, headers)
    .then(response => {
      console.log(response.data)
    })
    .catch(error => {
      console.log(error)
    })
}