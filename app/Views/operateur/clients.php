<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptes Clients - Opérateur</title>
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
                        <a class="nav-link" href="/operateur/baremes">Barèmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/operateur/gains">Situation Gains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/operateur/clients">Comptes Clients</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-primary">Situation des Comptes Clients</h2>
                <p class="text-muted">Liste de tous les clients inscrits et leurs soldes respectifs.</p>
            </div>
        </div>
        
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-striped table-hover m-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID Client</th>
                            <th>Numéro de Téléphone</th>
                            <th>Solde Actuel</th>
                            <th>Date de Création</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($clients) && !empty($clients)): ?>
                            <?php foreach($clients as $c): ?>
                            <tr>
                                <td class="align-middle"><?= $c['id'] ?></td>
                                <td class="align-middle fw-bold"><?= esc($c['numero_telephone']) ?></td>
                                <td class="align-middle fw-bold text-primary"><?= number_format($c['solde'], 2, ',', ' ') ?> Ar</td>
                                <td class="align-middle"><?= date('d/m/Y H:i', strtotime($c['date_creation'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center p-4 text-muted">Aucun client enregistré.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
