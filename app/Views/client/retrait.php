<?php $title = 'Faire un retrait'; ?>
<?= $this->extend('client/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="custom-card">
            <h5 class="custom-card-title">Nouveau retrait</h5>
            <form action="<?= site_url('client/retrait/ajout') ?>" method="get">
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">MONTANT À RETIRER (Ar)</label>
                    <input type="number" step="0.01" class="form-control bg-light border-0 py-3 fs-5 fw-bold" name="montant" required placeholder="0.00">
                </div>
                <button type="submit" class="btn btn-custom w-100 py-3 fw-bold rounded-pill">Valider le retrait</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>