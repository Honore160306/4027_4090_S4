<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration des Préfixes - Opérateur</title>

</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/operateur/prefixes">Admin Opérateur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/operateur/prefixes">Préfixes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/operateur/baremes">Barèmes</a>
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
                <h2 class="text-primary">Configuration des Préfixes</h2>
                <p class="text-muted">Gérez les préfixes téléphoniques valables de l'opérateur.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Ajouter un préfixe</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('operateur/prefixes/create') ?>" method="post">
                            <div class="mb-3">
                                <label for="prefixe" class="form-label">Nouveau préfixe</label>
                                <input type="text" class="form-control" id="prefixe" name="prefixe" required placeholder="Ex: 033" maxlength="10">
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
                                    <th>ID</th>
                                    <th>Préfixe</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($prefixes) && !empty($prefixes)): ?>
                                    <?php foreach($prefixes as $p): ?>
                                    <tr>
                                        <td class="align-middle"><?= $p['id'] ?></td>
                                        <td class="align-middle fw-bold"><?= esc($p['prefixe']) ?></td>
                                        <td class="text-end">
        
                                            <a href="<?= base_url('operateur/prefixes/delete/' . $p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce préfixe ?');">
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
        </div>
    </div>
</body>
</html>
