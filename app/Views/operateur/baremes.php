<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barèmes de Frais - Opérateur</title>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/operateur">Admin Opérateur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/operateur/prefixes">Préfixes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/operateur/baremes">Barèmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/operateur/gains">Situation Gains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/operateur/clients">Comptes Clients</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-primary">Configuration des Barèmes de Frais</h2>
                <p class="text-muted">Définissez les frais pour les retraits et transferts selon les tranches de montants.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Ajouter un barème</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('operateur/baremes/create') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Type d'opération</label>
                                <select name="type_operation_id" class="form-select" required>
                                    <?php foreach($types as $t): ?>
                                    <option value="<?= $t['id'] ?>"><?= ucfirst($t['nom']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montant Minimum</label>
                                <input type="number" step="0.01" class="form-control" name="montant_min" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montant Maximum</label>
                                <input type="number" step="0.01" class="form-control" name="montant_max" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Frais (Ar)</label>
                                <input type="number" step="0.01" class="form-control" name="frais" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover m-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Opération</th>
                                    <th>Tranche</th>
                                    <th>Frais</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($baremes) && !empty($baremes)): ?>
                                    <?php foreach($baremes as $b): ?>
                                    <tr>
                                        <td class="align-middle fw-bold"><?= ucfirst($b['type_nom']) ?></td>
                                        <td class="align-middle">
                                            <?= number_format($b['montant_min'], 0, ',', ' ') ?> à 
                                            <?= number_format($b['montant_max'], 0, ',', ' ') ?> Ar
                                        </td>
                                        <td class="align-middle fw-bold text-danger"><?= number_format($b['frais'], 0, ',', ' ') ?> Ar</td>
                                        <td class="text-end">
                                            <a href="<?= base_url('operateur/baremes/delete/' . $b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce barème ?');">Supprimer</a>
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
        </div>
    </div>
</body>
</html>
