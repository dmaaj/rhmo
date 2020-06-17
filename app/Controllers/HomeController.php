<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        
        $this->sendJson(['Welcome to RHMO'], 'success', 200);
    }
}