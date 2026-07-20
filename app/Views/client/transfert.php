<?php $title = 'Faire un transfert'; ?>
<?= $this->extend('client/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="custom-card">
            <h5 class="custom-card-title">Nouveau transfert</h5>
            <form action="<?= site_url('client/transfert/ajout') ?>" method="post">
                <!-- <div class="mb-3">
                    <label class="form-label text-muted small fw-bold">NUMÉRO DU DESTINATAIRE</label>
                    <input type="text" class="form-control bg-light border-0 py-2 fw-bold" name="numero_destinataire" placeholder="033 XX XXX XX">
                </div> -->
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">MONTANT À TRANSFÉRER (Ar)</label>
                    <input type="number" step="0.01" class="form-control bg-light border-0 py-3 fs-5 fw-bold" name="montant" required placeholder="0.00">
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">Numéro à transférer</label>
                    <input type="text"
                        class="form-control bg-light border-0 py-3 fs-5 fw-bold"
                        name="numero_dest"
                        maxlength="10"
                        placeholder="0331234567"
                        required>
                </div>
                <button type="submit" class="btn btn-custom w-100 py-3 fw-bold rounded-pill">Valider le transfert</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>