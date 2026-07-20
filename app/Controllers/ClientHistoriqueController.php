<?php

namespace App\Controllers;

class ClientHistoriqueController extends BaseController
{
    public function historique(): string
    {
        $db = \Config\Database::connect();

        // Récupération du numéro du client connecté depuis la session
        $numero = session()->get('numero');

        // Requête SQL sans Query Builder
        $sql = "
            SELECT 
                o.id,
                o.date_operation,
                t.nom AS type_operation,
                o.montant,
                o.frais,
                c.numero_telephone AS destinataire
            FROM operations o

            INNER JOIN types_operation t
                ON t.id = o.type_operation_id

            INNER JOIN clients cl
                ON cl.id = o.client_id

            LEFT JOIN clients c
                ON c.id = o.client_destinataire_id

            WHERE cl.numero_telephone = ?

            ORDER BY o.date_operation DESC
        ";

        $query = $db->query($sql, [$numero]);

        $data = [
            'operations' => $query->getResult()
        ];

        return view('client/historique', $data);
    }
}