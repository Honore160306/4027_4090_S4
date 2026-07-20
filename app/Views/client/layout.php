<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Espace Client' ?></title>
    <!-- Chargement de Bootstrap offline -->
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Chargement du CSS personnalisé -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
    
    <!-- Sidebar / Menu Latéral -->
    <div class="sidebar">
        <div class="sidebar-logo">mn.</div>
        <div class="sidebar-menu">
            <!-- Icon Solde -->
            <a href="<?= base_url('client/solde2') ?>" class="<?= url_is('client/solde*') ? 'active' : '' ?>" title="Mon Solde">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3zm1 0v10h12V3H2z"/><path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
            </a>
            
            <!-- Icon Dépôt -->
            <a href="<?= base_url('client/depot') ?>" class="<?= url_is('client/depot*') ? 'active' : '' ?>" title="Faire un dépôt">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>
            </a>
            
            <!-- Icon Retrait -->
            <a href="<?= base_url('client/retrait') ?>" class="<?= url_is('client/retrait*') ? 'active' : '' ?>" title="Faire un retrait">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/></svg>
            </a>
            
            <!-- Icon Transfert -->
            <a href="<?= base_url('client/transfert') ?>" class="<?= url_is('client/transfert*') ? 'active' : '' ?>" title="Faire un transfert">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/></svg>
            </a>

            <!-- Icon Historique -->
            <a href="<?= base_url('client/historique') ?>" class="<?= url_is('client/historique*') ? 'active' : '' ?>" title="Historique">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.757.205 1.114.354l-.348.921zm1.748 1.129a7.014 7.014 0 0 0-.809-.598l.493-.873a8.01 8.01 0 0 1 1.045.748l-.729.723zm1.265 1.637a7.03 7.03 0 0 0-.613-.787l.685-.726a8.03 8.03 0 0 1 .792 1.01l-.864.503zm.712 1.954a7.043 7.043 0 0 0-.376-.909l.859-.494a8.043 8.043 0 0 1 .486 1.17l-.969.233zM15 8h-1a7 7 0 0 0-.019-.515l.997-.074A8 8 0 0 1 15 8zM1.019 7.485A7 7 0 0 0 1 8H0a8 8 0 0 1 .022-.589l.997.074zm.45-2.004a7.003 7.003 0 0 0-.299.985l-.976-.219a8.003 8.003 0 0 1 .354-1.114l.921.348zm1.129-1.748a7.014 7.014 0 0 0-.598.809l-.873-.493a8.01 8.01 0 0 1 .748-1.045l.723.729zm1.637-1.265a7.03 7.03 0 0 0-.787.613l-.726-.685a8.03 8.03 0 0 1 1.01-.792l.503.864zm1.954-.712a7.043 7.043 0 0 0-.909.376l-.494-.859a8.043 8.043 0 0 1 1.17-.486l.233.969zM8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4.5a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5z"/></svg>
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Barre de navigation supérieure (Header) -->
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2">
            <div>
                <h3 class="fw-bold mb-0 text-dark">Bonjour !</h3>
                <span class="text-muted small">Espace Client : <?= $title ?? 'Accueil' ?></span>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <!-- Date -->
                <div class="bg-white px-3 py-2 rounded-pill shadow-sm text-muted fw-bold d-flex align-items-center gap-2" style="font-size: 13px;">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                    Aujourd'hui
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                </div>
                
                <div class="bg-white p-2 rounded-circle shadow-sm" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; cursor: pointer;">
                    <svg width="18" height="18" fill="#1a1b22" viewBox="0 0 16 16"><path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/><path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/></svg>
                </div>
                
                <!-- Avatar User -->
                <div class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-weight: bold;">
                    <?= strtoupper(substr(session()->get('numero') ?? 'CL', 0, 2)) ?>
                </div>

                <!-- Logout Button -->
                <a href="<?= base_url('client/logout') ?>" class="text-danger ms-2" title="Déconnexion">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                </a>
            </div>
        </div>

        <!-- Injection du contenu spécifique de la page -->
        <?= $this->renderSection('content') ?>

    </div>
    
    <!-- Script Bootstrap offline -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
