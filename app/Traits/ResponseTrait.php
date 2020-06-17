<?php
namespace App\Traits;

trait ResponseTrait
{
    public function sendJson(array $data = [], string $message = "", int $status = 200) : void
    {
        $encodedString = json_encode([
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ], true);

        http_response_code($status);
        $this->forceJson($encodedString);
    }


    public function forceJson(string $string) : void
    {
        header('Content-Type: application/json');
        echo $string;
        die();
    }
}