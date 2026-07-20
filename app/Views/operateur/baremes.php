<?php $title = 'Barèmes de Frais'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="custom-card">
            <h5 class="custom-card-title">Ajouter un barème</h5>
            <form action="<?= base_url('operateur/baremes/create') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold">TYPE D'OPÉRATION</label>
                    <select name="type_operation_id" class="form-select bg-light border-0 py-2" required>
                        <?php foreach($types as $t): ?>
                        <option value="<?= $t['id'] ?>"><?= ucfirst($t['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold">MINIMUM</label>
                        <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="montant_min" placeholder="0.00" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold">MAXIMUM</label>
                        <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="montant_max" placeholder="0.00" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">FRAIS (Ar)</label>
                    <input type="number" step="0.01" class="form-control bg-light border-0 py-2" name="frais" required placeholder="Ex: 500">
                </div>
                <button type="submit" class="btn btn-custom w-100 py-2">Enregistrer</button>
            </form>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="custom-card p-0 overflow-hidden">
            <table class="table table-borderless table-custom mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th class="px-4 py-3">Opération</th>
                        <th class="px-4 py-3">Tranche</th>
                        <th class="px-4 py-3">Frais</th>
                        <th class="px-4 py-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($baremes) && !empty($baremes)): ?>
                        <?php foreach($baremes as $b): ?>
                        <tr>
                            <td class="px-4 py-3 fw-bold align-middle">
                                <span class="badge bg-light text-dark border px-2 py-1 rounded-pill"><?= ucfirst($b['type_nom']) ?></span>
                            </td>
                            <td class="px-4 py-3 text-muted align-middle">
                                <?= number_format($b['montant_min'], 0, ',', ' ') ?> à 
                                <?= number_format($b['montant_max'], 0, ',', ' ') ?> Ar
                            </td>
                            <td class="px-4 py-3 fw-bold align-middle" style="color: #1a1b22;">
                                <?= number_format($b['frais'], 0, ',', ' ') ?> Ar
                            </td>
                            <td class="px-4 py-3 text-end text-nowrap">
                                <a href="<?= base_url('operateur/baremes/edit/' . $b['id']) ?>" class="btn btn-outline-dark btn-sm rounded-pill px-3 me-2">Modifier</a>
                                <a href="<?= base_url('operateur/baremes/delete/' . $b['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Supprimer ce barème ?');">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center p-4 text-muted">Aucun barème configuré.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
