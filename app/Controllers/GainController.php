<?php

namespace App\Controllers;

class GainController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data['gains'] = $db->query('SELECT * FROM situation_gains')->getResultArray();
        
        return view('operateur/gains', $data);
    }
}
