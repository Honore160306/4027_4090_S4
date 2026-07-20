<?php $title = 'Modifier un Barème'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 mx-auto mb-4">
        <div class="custom-card">
            <h5 class="custom-card-title mb-4">Modifier le barème #<?= $bareme['id'] ?></h5>
            <form action="<?= base_url('operateur/baremes/update/' . $bareme['id']) ?>" method="post">
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold">TYPE D'OPÉRATION</label>
                    <select name="type_operation_id" class="form-select bg-light border-0 py-2" required>
                        <?php foreach($types as $t): ?>
                        <option value="<?= $t['id'] ?>" <?= $t['id'] == $bareme['type_operation_id'] ? 'selected' : '' ?>><?= ucfirst($t['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold">MINIMUM</label>
                        <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="montant_min" value="<?= esc($bareme['montant_min']) ?>" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold">MAXIMUM</label>
                        <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="montant_max" value="<?= esc($bareme['montant_max']) ?>" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">FRAIS (Ar)</label>
                    <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="frais" value="<?= esc($bareme['frais']) ?>" required>
                </div>
                
                <div class="d-flex gap-3">
                    <a href="<?= base_url('operateur/baremes') ?>" class="btn btn-outline-secondary w-50 py-2 rounded-pill fw-bold">Annuler</a>
                    <button type="submit" class="btn btn-custom w-50 py-2 rounded-pill fw-bold">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
