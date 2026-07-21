<?php

namespace App\Controllers;

class ClientSoldeController extends BaseController
{
    public function solde()
{
    $numero = $this->request->getPost('numero');

    $db = \Config\Database::connect();

    // Vérifier si le numéro commence par un préfixe valide
    $sqlPrefixe = "SELECT * FROM prefixes WHERE ? LIKE CONCAT(prefixe, '%')";
    $queryPrefixe = $db->query($sqlPrefixe, [$numero]);

    $prefixe = $queryPrefixe->getRow();

    if ($prefixe === null) {
        return redirect()->to('/client/login')
            ->with('erreur', 'Numéro invalide : préfixe non autorisé.');
    }

    // Enregistrer le numéro dans la session seulement si le préfixe est valide
    session()->set('numero', $numero);

    // Chercher le client
    $sql = "SELECT * FROM clients WHERE numero_telephone = ?";
    $query = $db->query($sql, [$numero]);
    $client = $query->getRow();

    if ($client === null) {

        // Création du client avec solde 0
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

    public function solde2(): string
{
    // Récupérer le numéro depuis la session
    $numero = session()->get('numero');

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

public function epargne(): string
{
    // Récupérer le numéro depuis la session
    $numero = session()->get('numero');

    $db = \Config\Database::connect();

    $sql = "SELECT * FROM clients WHERE numero_telephone = ?";
    $query = $db->query($sql, [$numero]);
    $client = $query->getRow();

    $clientId = $client->id;
    $sql = "SELECT * FROM epargne WHERE id_client = ?";
    $query = $db->query($sql, [$clientId]);
    $epargne = $query->getRow();

    $solde = $epargne->solde;
    return view('client/epargne', [
        'solde'  => $solde
    ]);
}
}