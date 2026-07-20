<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situation Gains - Opérateur</title>
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
                        <a class="nav-link active" href="/operateur/gains">Situation Gains</a>
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
                <h2 class="text-primary">Situation des Gains</h2>
                <p class="text-muted">Gains obtenus grâce aux frais sur les retraits et transferts.</p>
            </div>
        </div>
        
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-striped table-hover m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Type d'opération</th>
                            <th>Nombre d'opérations effectuées</th>
                            <th>Gain Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($gains) && !empty($gains)): ?>
                            <?php foreach($gains as $g): ?>
                            <tr>
                                <td class="align-middle fw-bold"><?= ucfirst($g['type_operation']) ?></td>
                                <td class="align-middle"><?= $g['nombre_operations'] ?></td>
                                <td class="align-middle fw-bold text-success"><?= number_format($g['gain_total'], 2, ',', ' ') ?> Ar</td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="3" class="text-center p-4 text-muted">Aucun gain enregistré pour le moment.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
