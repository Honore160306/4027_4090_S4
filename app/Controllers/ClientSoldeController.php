<?php

namespace App\Controllers;

class ClientSoldeController extends BaseController
{
    public function solde()
    {
        $numero = $this->request->getPost('numero');

        // Enregistrer le numéro dans la session
        session()->set('numero', $numero);

        $db = \Config\Database::connect();

        $sql = "SELECT * FROM clients WHERE numero_telephone = ?";
        $query = $db->query($sql, [$numero]);
        $client = $query->getRow();

        if ($client === null) {
            $insert = "INSERT INTO clients (numero_telephone, solde) VALUES (?, ?)";
            $db->query($insert, [$numero, 0]);

            $solde = 0;
        } else {
            $solde = $client->solde;
        }

        return view('client/solde', [
            'numero' => $numero,
            'solde'  => $solde
        ]);
    }

    public function solde2()
    {
        return view('client/solde');
    }
}