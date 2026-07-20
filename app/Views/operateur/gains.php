<?php $title = 'Situation des Gains'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<?php 
$total_general = 0;
if(isset($gains) && !empty($gains)) {
    foreach($gains as $g) {
        $total_general += $g['gain_total'];
    }
}

// Grouper les résultats par opérateur
$par_operateur = [];
if(isset($gains) && !empty($gains)) {
    foreach($gains as $g) {
        $par_operateur[$g['operateur']][] = $g;
    }
}
?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="dark-card h-100">
            <div>
                <div class="dark-card-title">Gains Totaux Globaux</div>
                <div class="dark-card-value text-success">+<?= number_format($total_general, 2, ',', ' ') ?> Ar</div>
            </div>
            <div class="bg-white rounded-circle p-2 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; color: #1a1b22;">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3zm1 0v10h12V3H2z"/><path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="custom-card h-100 d-flex flex-column justify-content-center m-0">
            <h5 class="custom-card-title mb-1">Résumé des gains par opérateur</h5>
            <p class="text-muted small mb-0">Le gain est calculé sur le montant de chaque opération multiplié par le pourcentage de l'opérateur.</p>
        </div>
    </div>
</div>

<?php if(empty($par_operateur)): ?>
    <div class="custom-card text-center p-5 text-muted">
        Aucun gain enregistré pour le moment.
    </div>
<?php else: ?>
    <?php foreach($par_operateur as $nom_operateur => $lignes): ?>
    <?php $total_op = array_sum(array_column($lignes, 'gain_total')); ?>
    <div class="custom-card mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-0" style="color: #1a1b22;"><?= esc($nom_operateur) ?></h5>
                <span class="text-muted small">Gain total de cet opérateur</span>
            </div>
            <span class="fw-bold fs-5 text-success">+<?= number_format($total_op, 2, ',', ' ') ?> Ar</span>
        </div>

        <table class="table table-borderless table-custom mb-0">
            <thead style="background-color: #f8f9fa;">
                <tr>
                    <th class="px-3 py-2">Type d'opération</th>
                    <th class="px-3 py-2 text-center">Nb opérations</th>
                    <th class="px-3 py-2 text-end">Gain</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lignes as $g): ?>
                <tr>
                    <td class="px-3 py-2 align-middle">
                        <span class="badge bg-light text-dark border px-2 py-1 rounded-pill"><?= ucfirst($g['type_operation']) ?></span>
                    </td>
                    <td class="px-3 py-2 align-middle text-center text-muted"><?= $g['nombre_operations'] ?></td>
                    <td class="px-3 py-2 align-middle text-end fw-bold text-success">+<?= number_format($g['gain_total'], 2, ',', ' ') ?> Ar</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->endSection() ?>
