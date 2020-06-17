<?php
namespace App\Services;

class Api
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function post(string $url, array $data, array $header = [])
    {
        try {
            return $this->formatResponse($this->client->request('POST', $url, [
                'headers' => $header,
                'json' => $data
            ]));
        } catch (\Throwable $th) {
            throwError($th->getMessage(), 500);
        }   
    }

    public function get(string $url, array $header = [])
    {
        try {
            return $this->formatResponse($this->client->request('GET', $url, [
                'headers' => $header,
            ]));
        } catch (\Throwable $th) {
            throwError($th->getMessage(), 500);
        }   
    }

    public function delete(string $url, array $header = [])
    {
        try {
            return $this->formatResponse($this->client->request('DELETE', $url, [
                'headers' => $header,
            ]));
        } catch (\Throwable $th) {
            throwError($th->getMessage(), 500);
        }   
    }

    public function formatResponse($response)
    {
        return json_decode($response->getBody(), true);
    }
}