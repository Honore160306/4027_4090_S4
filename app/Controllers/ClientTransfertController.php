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
        $numeroSession = session()->get('numero');

        if (!$numeroSession) {
            return redirect()->back()
                ->with('error', 'Session numéro inexistante.');
        }

        $client = $db->query(
            "SELECT id, solde
             FROM clients
             WHERE numero_telephone=?",
            [$numeroSession]
        )->getRow();

        if (!$client) {
            return redirect()->back()
                ->with('error', 'Client introuvable.');
        }

        $clientId = $client->id;
        $montantTotal = (float)$this->request->getGet('montant');
        $numeros = trim($this->request->getGet('numeros'));

        if ($montantTotal <= 0) {
            return redirect()->back()
                ->with('error', 'Montant invalide.');
        }

        if (!$numeros) {
            return redirect()->back()
                ->with('error', 'Aucun destinataire.');
        }

        $listeNumeros = preg_split(
            '/[\r\n,]+/',
            $numeros
        );
        $destinataires = [];

        foreach ($listeNumeros as $num) {
            $num = trim($num);
            if ($num != '') {
                $destinataires[] = $num;
            }
        }

        $destinataires = array_unique($destinataires);
        $nombreDest = count($destinataires);

        if ($nombreDest == 0) {
            return redirect()->back()
                ->with('error', 'Aucun destinataire.');
        }
        $montantParDest = $montantTotal / $nombreDest;

        $type = $db->query(
            "SELECT id
             FROM types_operation
             WHERE nom='transfert'"
        )->getRow();

        if (!$type) {
            return redirect()->back()
                ->with('error', 'Type transfert introuvable.');
        }
        $typeOperationId = $type->id;
        $fraisTotal = 0;

        foreach ($destinataires as $numero) {
            $frais = $db->query(
                "SELECT frais
                 FROM baremes_frais
                 WHERE type_operation_id=?
                 AND ? BETWEEN montant_min AND montant_max",
                [
                    $typeOperationId,
                    $montantParDest
                ]
            )->getRow();

            if ($frais) {
                $fraisTotal += $frais->frais;
            }
        }
        $totalDebit = $montantTotal + $fraisTotal;

        if ($client->solde < $totalDebit) {
            return redirect()->back()
                ->with(
                    'error',
                    'Solde insuffisant. Nécessaire : ' . $totalDebit . ' Ar'
                );
        }

        $db->transStart();
        foreach ($destinataires as $numero) {
            $dest = $db->query(
                "SELECT id
                 FROM clients
                 WHERE numero_telephone=?",
                [$numero]
            )->getRow();

            if (!$dest) {
                $db->transRollback();
                return redirect()->back()
                    ->with(
                        'error',
                        "Le numéro $numero n'existe pas."
                    );
            }

            if ($dest->id == $clientId) {
                $db->transRollback();
                return redirect()->back()
                    ->with(
                        'error',
                        'Impossible de transférer vers votre propre numéro.'
                    );
            }

            $frais = $db->query(
                "SELECT frais
                 FROM baremes_frais
                 WHERE type_operation_id=?
                 AND ? BETWEEN montant_min AND montant_max",
                [
                    $typeOperationId,
                    $montantParDest
                ]
            )->getRow();

             $frais_op = $db->query(
                "SELECT * 
                 FROM frais_meme_operateur
                 WHERE id_operateur =? ",
                [
                    1
                ]
            )->getRow();
            $fraisOp = $frais_op->$pourcentage;

            $fraisDest = $frais ? $frais->frais : 0;
            $db->query(
                "INSERT INTO operations
                (
                    client_id,
                    client_destinataire_id,
                    type_operation_id,
                    montant,
                    frais
                )
                VALUES(?,?,?,?,?)",
                [
                    $clientId,
                    $dest->id,
                    $typeOperationId,
                    $montantParDest,
                    $fraisDest + ($fraisDest * $frais_op)/100
                ]
            );
        }

        $db->transComplete();
        if ($db->transStatus() === false) {
            return redirect()->back()
                ->with(
                    'error',
                    'Erreur pendant le transfert.'
                );
        }

        return redirect()
            ->to(site_url('client/transfert'))
            ->with(
                'success',
                'Transfert multiple effectué avec succès.'
            );
    }
}
