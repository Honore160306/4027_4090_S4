<?php

namespace App\Controllers;

use App\Models\PrefixeModel;

class PrefixeController extends BaseController
{
    public function index()
    {
        $prefixeModel = new PrefixeModel();
        $data['prefixes'] = $prefixeModel->findAll();

        return view('operateur/prefixes', $data);
    }

    public function create()
    {
        $prefixeModel = new PrefixeModel();
        $prefixeModel->insert([
            'prefixe' => $this->request->getPost('prefixe')
        ]);

        return redirect()->to('/operateur/prefixes');
    }

    public function delete($id)
    {
        $prefixeModel = new PrefixeModel();
        $prefixeModel->delete($id);

        return redirect()->to('/operateur/prefixes');
    }
}