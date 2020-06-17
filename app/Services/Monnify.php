<?php

namespace App\Services;

use App\Services\Api;
use GuzzleHttp\Client;

class Monnify extends Api
{
    public function __construct()
    {
        $client = new Client([
            'base_uri' => MONNIFY_BASE_URL
        ]);

        $this->client = $client;

        parent::__construct($client);
    }


    /**
     * Undocumented function
     *
     * @param array $data
     * @return Array
     */
    public function reserve(array $data) :array
    {
        $url = 'bank-transfer/reserved-accounts';

        return $this->post($url, $data, $this->getHeaders());

    }

    /**
     * Undocumented function
     *
     * @param String $account
     * @return array
     */
    public function deactivate(String $account) :array
    {
        $url = "bank-transfer/reserved-accounts/$account";
        
        return $this->delete($url, $this->getHeaders());
    }


    /**
     * Undocumented function
     *
     * @param String $paymentReference
     * @return array
     */
    public function status(String $paymentReference) : array
    {
        $url = "merchant/transactions/query?paymentReference=$paymentReference";

        return $this->get($url, $this->getHeaders());
    }


    protected function getHeaders(){
        $token = $this->authenticate();

        return [
            'Authorization' => "Bearer $token"
        ];
    }


    /**
     * @Todo
     * Cache for 50 minutes
     * and only generate when token expires
     * @return string
     */
    private function authenticate()
    {
        try {
            $response = $this->client->request('POST', 'auth/login', [
                'auth' => [MONNIFY_APIKEY, MONNIFY_APIPASS]
            ]);

            $data = $this->formatResponse($response);

            return $data['responseBody']['accessToken'];

        } catch (\Throwable $th) {
            throwError($th->getMessage(), 401);
        }
    }
}
