<?php $title = 'Comptes Clients'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<div class="custom-card p-0 overflow-hidden mt-2">
    <div class="p-4 border-bottom">
        <h5 class="custom-card-title mb-0">Liste des clients inscrits</h5>
    </div>
    <table class="table table-borderless table-custom mb-0">
        <thead style="background-color: #f8f9fa;">
            <tr>
                <th class="px-4 py-3">Client</th>
                <th class="px-4 py-3">Numéro de Téléphone</th>
                <th class="px-4 py-3 text-end">Solde Actuel</th>
                <th class="px-4 py-3 text-end">Date d'inscription</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($clients) && !empty($clients)): ?>
                <?php foreach($clients as $c): ?>
                <tr>
                    <td class="px-4 py-3 align-middle">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle d-flex justify-content-center align-items-center text-muted fw-bold" style="width: 35px; height: 35px; font-size: 12px;">
                                C<?= $c['id'] ?>
                            </div>
                            <span class="fw-bold" style="color: #1a1b22;">Client #<?= $c['id'] ?></span>
                        </div>
                    </td>
                    <td class="px-4 py-3 fw-bold align-middle text-muted"><?= esc($c['numero_telephone']) ?></td>
                    <td class="px-4 py-3 text-end fw-bold align-middle" style="font-size: 16px;">
                        <?= number_format($c['solde'], 2, ',', ' ') ?> Ar
                    </td>
                    <td class="px-4 py-3 text-end text-muted align-middle small">
                        <?= date('d M Y, H:i', strtotime($c['date_creation'])) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center p-5 text-muted">Aucun client enregistré.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
