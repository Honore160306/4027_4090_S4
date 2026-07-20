<?php

namespace App\Controllers;

use App\Models\ClientModel;

class ClientController extends BaseController
{
    public function index()
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->findAll();
        
        return view('operateur/clients', $data);
    }
}
