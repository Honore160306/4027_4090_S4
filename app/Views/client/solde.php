<?php $title = 'Mon Solde'; ?>
<?= $this->extend('client/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-md-6">
        <div class="credit-card-box shadow-lg">
            <div>
                <p class="text-white-50 mb-1 small">Solde Actuel</p>
                <h3 class="fw-bold mb-0" style="font-size: 32px;"><?= number_format($solde, 2, ',', ' ') ?> Ar</h3>
            </div>
            <div>
                <p class="text-white-50 mb-1 small">Numéro du compte</p>
                <p class="fw-bold mb-0 fs-5" style="letter-spacing: 2px;"><?= esc(session()->get('numero')) ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>