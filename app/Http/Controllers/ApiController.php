<?php

namespace App\Http\Controllers;

use App\EncryptParameters;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    private $accessKey = "";

    public function __construct()
    {
        $this->accessKey = env('MULLA_ACCESS_KEY');
    }

    public function express_pay (Request $request, Response $response) {
        $payload = array(
            'transactionID' => Uuid::uuid4(), // The merchant's unique transaction identifier.
            'customerFirstName' => $request->get('fname'),
            'customerLastName' => $request->get('lname'),
            'MSISDN' => $request->get('phone_number'), // The customer's mobile number.
            'customerEmail' => $request->get('email'),
            'amount' => $request->get('total'),
            'currency' => 'KES',
            'reference' => '', // The account number/reference number for the transaction.
            'serviceCode' => '', // The merchant's service code.
            'productCode' => '',
            'dueDate' => '',
            'serviceDescription' => '', // The transaction's narrative.
            'countryCode' => '', // The merchant's default country country code.
            'language' => '',
            'callBackUrl' => '',
            'webhookPaymentUrl' => '',
            'failedCallBackUrl' => ''
        );
        $encryptParams = new EncryptParameters;
        $encryptedParams = $encryptParams->encryptData($payload);

        return $response->json(array(
            'countryCode' => '+254',
            'accessKey' => $this->accessKey,
            'params' => $encryptedParams
        ));
    }
}
