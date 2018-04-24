<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    private $iv;
    private $key;
    private $accessKey;

    public function __construct()
    {
        $this->iv = env('MULLA_IV');
        $this->key = env('MULLA_KEY');
        $this->accessKey = env('MULLA_ACCESS_KEY');
    }

    public function express_pay (Request $request, Response $response) {
        $payload = array(
            'transactionID' => '0001',
            'customerFirstName' => $request->get('fname'),
            'customerLastName' => $request->get('lname'),
            'MSISDN' => $request->get('phone_number'),
            'customerEmail' => $request->get('email'),
            'amount' => $request->get('amount'),
            'currency' => 'KES',
            'reference' => '10001',
            'serviceCode' => env('MULLA_SERVICE_CODE'),
            'productCode' => '100',
            'dueDate' => Carbon::now()->addDay(),
            'serviceDescription' => 'Payment for purchase',
            'countryCode' => 'KE',
            'language' => 'en',
            'callBackUrl' => $request->server('HTTP_ORIGIN').'/express-pay',
            'webhookPaymentUrl' => $request->server('HTTP_ORIGIN'),
            'failedCallBackUrl' => $request->server('HTTP_ORIGIN').'/express-pay'
        );
        $encryptedParams = $this->encryptData($payload);

        return array(
            'COUNTRY_CODE' => 'KE',
            'ACCESS_KEY' => $this->accessKey,
            'PARAMS' => $encryptedParams
        );
    }

    public function encryptData($payload = [])
    {
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $this->key);
        $iv = substr(hash('sha256', $this->iv), 0, 16);

        $encrypted = openssl_encrypt(
            json_encode($payload, true),
            $encrypt_method,
            $key,
            0,
            $iv
        );
        //Base 64 Encode the encrypted payload
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

}
