<?php

namespace App\Requests;

use App\Requests\BaseRequest;

class ReservationRequest extends BaseRequest
{
    public $required = [
        "accountName",
        "customerEmail",
        "customerName",
        "customerAccountNumber",
        "customerBankCode",
        "customerAccountNames"
    ];

    public function validate(array $request)
    {
        return $this->check($this->required, $request);
    }
}
