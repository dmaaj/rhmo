<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\Monnify;

class TransactionController extends BaseController
{
    public function __construct()
    {
        $this->agent = new Monnify;
    }

    public function status()
    {
        $reference = $_POST['reference'];
        $this->sendJson($this->agent->status($reference), 'success', 200);
    }
}