<?php

namespace App\Controllers;

use App\Models\BaremeFraisModel;
use App\Models\TypeOperationModel;

class BaremeController extends BaseController
{
    public function index()
    {
        $typeOpModel = new TypeOperationModel();
        
        $db = \Config\Database::connect();
        $builder = $db->table('baremes_frais');
        $builder->select('baremes_frais.*, types_operation.nom as type_nom');
        $builder->join('types_operation', 'types_operation.id = baremes_frais.type_operation_id');
        $data['baremes'] = $builder->get()->getResultArray();
        
        $data['types'] = $typeOpModel->findAll();
        
        return view('operateur/baremes', $data);
    }

    public function create()
    {
        $baremeModel = new BaremeFraisModel();
        $baremeModel->insert([
            'type_operation_id' => $this->request->getPost('type_operation_id'),
            'montant_min' => $this->request->getPost('montant_min'),
            'montant_max' => $this->request->getPost('montant_max'),
            'frais' => $this->request->getPost('frais'),
        ]);
        
        return redirect()->to('/operateur/baremes');
    }

    public function delete($id)
    {
        $baremeModel = new BaremeFraisModel();
        $baremeModel->delete($id);
        
        return redirect()->to('/operateur/baremes');
    }

    public function edit($id)
    {
        $baremeModel = new BaremeFraisModel();
        $typeOpModel = new TypeOperationModel();
        
        $data['bareme'] = $baremeModel->find($id);
        $data['types'] = $typeOpModel->findAll();
        
        if (!$data['bareme']) {
            return redirect()->to('/operateur/baremes');
        }
        
        return view('operateur/bareme_edit', $data);
    }

    public function update($id)
    {
        $baremeModel = new BaremeFraisModel();
        $baremeModel->update($id, [
            'type_operation_id' => $this->request->getPost('type_operation_id'),
            'montant_min' => $this->request->getPost('montant_min'),
            'montant_max' => $this->request->getPost('montant_max'),
            'frais' => $this->request->getPost('frais'),
        ]);
        
        return redirect()->to('/operateur/baremes');
    }
}
