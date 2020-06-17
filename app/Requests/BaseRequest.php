<?php
namespace App\Requests;

class BaseRequest
{
    
    public function check(array $keys, array $arr) {
        if(array_diff_key(array_flip($keys), $arr)){
            throwError([$keys], 400);
        };
        return $arr;
    }

}