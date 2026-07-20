<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Client</title>
    <!-- Chargement de Bootstrap offline -->
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Chargement du CSS personnalisé -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100" style="background-color: #F6F7F9;">
    
    <div class="custom-card shadow-lg p-5" style="width: 100%; max-width: 450px; border-radius: 30px;">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #1a1b22; font-size: 40px; letter-spacing: -2px;">mn.</h1>
            <p class="text-muted">Espace Client Mobile Money</p>
        </div>

        <form action="<?= site_url('client/solde') ?>" method="post">
            <div class="mb-4">
                <label class="form-label text-muted small fw-bold">NUMÉRO DE TÉLÉPHONE</label>
                <input type="text" class="form-control bg-light border-0 py-3 fw-bold" name="numero" required placeholder="033 XX XXX XX" autofocus>
            </div>

            <button type="submit" class="btn btn-custom w-100 py-3 fw-bold rounded-pill">Se connecter</button>
        </form>
    </div>

</body>
</html>