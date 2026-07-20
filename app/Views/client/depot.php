<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Faire un depôt</title>
</head>
<body>

<a href="<?= site_url('client/solde') ?>">Voir le solde</a>
<a href="<?= site_url('client/depot') ?>">Faire un dépôt</a>
<a href="<?= site_url('client/retrait') ?>">Faire un retrait</a>
<a href="<?= site_url('client/transfert') ?>">Faire un transfert</a>
<a href="<?= site_url('client/historique') ?>">Voir les historiques</a>

<h1>Faire un depôt</h1>
<form action="client/depot/ajout" method="post">
    <p>Montant: <input type="text" name="montant"></p>
    <input type="submit" value="valider">
</form>
</body>
</html>