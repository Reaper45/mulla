<?php
/**
 * Created by PhpStorm.
 * User: joram
 * Date: 4/22/18
 * Time: 8:33 AM
 */

namespace App;


class EncryptParameters
{
    /**
     * Merchant's IV key
     */
    private $iv;
    /**
     * Merchant's secret key
     */
    private $key;
    /**
     * EncryptParameters constructor.
     */
    public function __construct()
    {
        $this->iv = 'hdfbgVJKN4B8pcvy';
        $this->key = 'GhKXrNFWcgvTB6Pf';
    }
    /**
     * Encrypt the string of customer details with the IV and secret key.
     *
     * @param $payload Pass in the array of parameters to be pass to express checkout.
     * @return string
     */
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