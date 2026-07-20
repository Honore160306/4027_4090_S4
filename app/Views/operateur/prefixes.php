<?php $title = 'Configuration des Préfixes'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="custom-card">
            <h5 class="custom-card-title">Ajouter un préfixe</h5>
            <form action="<?= base_url('operateur/prefixes/create') ?>" method="post">
                <div class="mb-3">
                    <label for="prefixe" class="form-label text-muted small fw-bold">NOUVEAU PRÉFIXE</label>
                    <input type="text" class="form-control bg-light border-0 py-2" id="prefixe" name="prefixe" required placeholder="Ex: 033" maxlength="10">
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
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Préfixe</th>
                        <th class="px-4 py-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($prefixes) && !empty($prefixes)): ?>
                        <?php foreach($prefixes as $p): ?>
                        <tr>
                            <td class="px-4 py-3 text-muted align-middle">#<?= $p['id'] ?></td>
                            <td class="px-4 py-3 fw-bold align-middle"><?= esc($p['prefixe']) ?></td>
                            <td class="px-4 py-3 text-end">
                                <a href="<?= base_url('operateur/prefixes/delete/' . $p['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Supprimer ce préfixe ?');">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center p-4 text-muted">
                                Aucun préfixe configuré pour le moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
