<?php

namespace App\Controllers;

class ClientTransfertController extends BaseController
{
    public function transfert(): string
    {
        return view('client/transfert');
    }

    public function ajout()
    {
        $db = \Config\Database::connect();

        // Client connecté
        $clientId = session()->get('client_id');

        // Données du formulaire
        $montant = (float) $this->request->getPost('montant');
        $numeroDest = trim($this->request->getPost('numero_dest'));

        // Vérifier que le destinataire existe
        $sql = "SELECT id, numero_telephone
                FROM clients
                WHERE numero_telephone = ?";
        $dest = $db->query($sql, [$numeroDest])->getRow();

        if (!$dest) {
            return redirect()->back()->with('error', 'Le destinataire est introuvable.');
        }

        // Empêcher le transfert vers soi-même
        if ($dest->id == $clientId) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas transférer vers votre propre numéro.');
        }

        // Récupérer le type d'opération "transfert"
        $sql = "SELECT id
                FROM types_operation
                WHERE nom = ?";
        $type = $db->query($sql, ['transfert'])->getRow();

        if (!$type) {
            return redirect()->back()->with('error', 'Type d\'opération introuvable.');
        }

        $typeOperationId = $type->id;

        // Récupérer les frais
        $sql = "SELECT frais
                FROM baremes_frais
                WHERE type_operation_id = ?
                AND ? BETWEEN montant_min AND montant_max";

        $result = $db->query($sql, [$typeOperationId, $montant])->getRow();

        $frais = $result ? $result->frais : 0;

        // Vérifier le solde du client
        $sql = "SELECT solde
                FROM clients
                WHERE id = ?";

        $client = $db->query($sql, [$clientId])->getRow();

        if (!$client) {
            return redirect()->back()->with('error', 'Client introuvable.');
        }

        if ($client->solde < ($montant + $frais)) {
            return redirect()->back()->with('error', 'Solde insuffisant.');
        }

        // Enregistrer l'opération
        $sql = "INSERT INTO operations
                (
                    client_id,
                    client_destinataire_id,
                    type_operation_id,
                    montant,
                    frais
                )
                VALUES (?, ?, ?, ?, ?)";

        $db->query($sql, [
            $clientId,
            $dest->id,
            $typeOperationId,
            $montant,
            $frais
        ]);

        // Le trigger met automatiquement à jour les soldes

        return redirect()->to(site_url('client/transfert'))
                         ->with('success', 'Transfert effectué avec succès.');
    }
}