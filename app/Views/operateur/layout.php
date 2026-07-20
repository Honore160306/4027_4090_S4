<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Tableau de bord Opérateur' ?></title>
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
    
   
    <div class="sidebar">
        <div class="sidebar-logo">MM.</div>
        <div class="sidebar-menu">
          
            <a href="<?= base_url('operateur/gains') ?>" class="<?= url_is('operateur/gains*') ? 'active' : '' ?>" title="Tableau de bord (Gains)">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/></svg>
            </a>
            
          
            <a href="<?= base_url('operateur/baremes') ?>" class="<?= url_is('operateur/baremes*') ? 'active' : '' ?>" title="Barèmes de frais">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3zm1 0v10h12V3H2z"/><path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
            </a>
            
        
            <a href="<?= base_url('operateur/prefixes') ?>" class="<?= url_is('operateur/prefixes*') ? 'active' : '' ?>" title="Préfixes valides">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>
            </a>
            
           
            <a href="<?= base_url('operateur/clients') ?>" class="<?= url_is('operateur/clients*') ? 'active' : '' ?>" title="Comptes Clients">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/><path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
            </a>
        </div>
    </div>
    
 
    <div class="main-content">
        
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2">
            <div>
                <h3 class="fw-bold mb-0 text-dark">Bonjour !</h3>
                <span class="text-muted small">Tableau de bord : <?= $title ?? 'Administration' ?></span>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-3">                
                <a href="<?= base_url('logout') ?>" class="text-danger ms-2" title="Déconnexion">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                </a>
            </div>
            </div>
        </div>

      
        <?= $this->renderSection('content') ?>

    </div>
    
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
