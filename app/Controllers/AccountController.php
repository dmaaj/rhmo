<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Requests\ReservationRequest as validator;
use App\Services\Monnify;

class AccountController extends BaseController
{
    private $agent;

    public function __construct()
    {
        $this->agent = new Monnify;
    }

    /**
     * Undocumented function
     *
     * @return Json
     */
    public function reserve()
    {
        $request = (new validator)->validate($_POST);

        $data = [
            "accountReference" => hexdec(uniqid()),
            "accountName" => $request['accountName'],
            "currencyCode"=> "NGN",
            "contractCode"=> MONNIFY_CONTRACTCODE,
            "customerEmail"=> $request['customerEmail'],
            "customerName"=> $request['customerName'],
        ];

        $this->sendJson($this->agent->reserve($data), 'success', 201);
    }

    /**
     * Undocumented function
     *
     * @param  Int $accountNumber
     * @return Json
     */
    public function deactivate()
    {
        $accountNumber = $_POST['accountNumber'];
        $this->sendJson($this->agent->deactivate($accountNumber), 'success', 200);
    }

}