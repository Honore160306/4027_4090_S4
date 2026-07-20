<?php

namespace App\Controllers;

class ClientDepotController extends BaseController
{
    public function depot(): string
    {
        return view('client/depot');
    }

    public function ajout()
    {
        $db = \Config\Database::connect();

        $clientId = session()->get('client_id');
        $montant = $this->request->getPost('montant');

        // Récupérer le type "depot" (ou utiliser directement son id si tu le connais)
        $sql = "SELECT id FROM types_operation WHERE nom = ?";
        $result = $db->query($sql, ['depot'])->getRow();

        $typeOperationId = $result->id;

        // Récupérer les frais correspondants
        $sql = "SELECT frais
                FROM baremes_frais
                WHERE type_operation_id = ?
                AND ? BETWEEN montant_min AND montant_max";

        $result = $db->query($sql, [$typeOperationId, $montant])->getRow();

        $frais = $result ? $result->frais : 0;

        // Insertion dans operations
        $sql = "INSERT INTO operations
                (client_id, client_destinataire_id, type_operation_id, montant, frais)
                VALUES (?, NULL, ?, ?, ?)";

        $db->query($sql, [
            $clientId,
            $typeOperationId,
            $montant,
            $frais
        ]);

        return redirect()->to(site_url('client/solde'));
    }
}