<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Solde du client</title>
</head>
<body>

<a href="<?= site_url('client/solde') ?>">Voir le solde</a>
<a href="<?= site_url('client/depot') ?>">Faire un dépôt</a>
<a href="<?= site_url('client/retrait') ?>">Faire un retrait</a>
<a href="<?= site_url('client/transfert') ?>">Faire un transfert</a>
<a href="<?= site_url('client/historique') ?>">Voir les historiques</a>

<h1>Solde du client</h1>
<p>Numéro : <?= esc(session()->get('numero')) ?></p>
<p>Solde : <?= esc($solde) ?> Ar</p>

</body>
</html>