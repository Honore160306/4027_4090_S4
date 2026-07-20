<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Historique des opérations</title>
</head>

<body>

<h1>Historique des opérations</h1>

<p>
    Client connecté :
    <strong>
        <?= esc(session()->get('numero')) ?>
    </strong>
</p>


<!-- Navigation -->

<a href="<?= site_url('client/solde') ?>">
    Voir le solde
</a>

<a href="<?= site_url('client/depot') ?>">
    Faire un dépôt
</a>

<a href="<?= site_url('client/retrait') ?>">
    Faire un retrait
</a>

<a href="<?= site_url('client/transfert') ?>">
    Faire un transfert
</a>


<br><br>


<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Type opération</th>
        <th>Montant</th>
        <th>Frais</th>
        <th>Destinataire</th>
    </tr>


    <?php if(empty($operations)): ?>

        <tr>
            <td colspan="6">
                Aucune opération trouvée
            </td>
        </tr>


    <?php else: ?>


        <?php foreach($operations as $op): ?>

        <tr>

            <td>
                <?= esc($op->id) ?>
            </td>

            <td>
                <?= esc($op->date_operation) ?>
            </td>

            <td>
                <?= esc(ucfirst($op->type_operation)) ?>
            </td>

            <td>
                <?= esc($op->montant) ?> Ar
            </td>

            <td>
                <?= esc($op->frais) ?> Ar
            </td>

            <td>
                <?= esc($op->destinataire ?? '-') ?>
            </td>

        </tr>

        <?php endforeach; ?>


    <?php endif; ?>


</table>


</body>
</html>