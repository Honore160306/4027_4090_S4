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
        $numero = session()->get('numero');

        if (!$numero) {
            return redirect()
                ->to(site_url('login'))
                ->with('error', 'Vous devez être connecté.');
        }

        $client = $db->query(
            "SELECT id FROM clients WHERE numero_telephone = ?",
            [$numero]
        )->getRow();

        if (!$client) {
            return redirect()
                ->back()
                ->with('error', 'Client introuvable.');
        }
        $clientId = $client->id;
        $montant = $this->request->getGet('montant');

        if (!$montant || $montant <= 0) {
            return redirect()
                ->back()
                ->with('error', 'Montant invalide.');
        }

        $type = $db->query(
            "SELECT id 
             FROM types_operation 
             WHERE nom = ?",
            ['depot']
        )->getRow();

        if (!$type) {
            return redirect()
                ->back()
                ->with('error', 'Type opération dépôt introuvable.');
        }
        $typeOperationId = $type->id;

        $bareme = $db->query(
            "SELECT frais
             FROM baremes_frais
             WHERE type_operation_id = ?
             AND ? BETWEEN montant_min AND montant_max",
            [
                $typeOperationId,
                $montant
            ]
        )->getRow();
        $frais = $bareme ? $bareme->frais : 0;

        $sql = "
            INSERT INTO operations
            (
                client_id,
                client_destinataire_id,
                type_operation_id,
                montant,
                frais
            )
            VALUES (?, NULL, ?, ?, ?)
        ";

        $db->query(
            $sql,
            [
                $clientId,
                $typeOperationId,
                $montant,
                $frais
            ]
        );

        $db->query(
            "UPDATE clients
             SET solde = solde + ?
             WHERE id = ?",
            [
                $montant,
                $clientId
            ]
        );

        return redirect()
            ->to(site_url('client/depot'))
            ->with('success', 'Dépôt effectué avec succès.');
    }
}
