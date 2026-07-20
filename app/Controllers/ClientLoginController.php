<?php

namespace App\Controllers;

class ClientLoginController extends BaseController
{
    public function login(): string
    {
        return view('client/login');
    }
}
