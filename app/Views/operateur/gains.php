<?php $title = 'Situation des Gains'; ?>
<?= $this->extend('operateur/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <?php 
    $total_general = 0;
    if(isset($gains) && !empty($gains)) {
        foreach($gains as $g) {
            $total_general += $g['gain_total'];
        }
    }
    ?>
    <div class="col-md-4">
        <div class="dark-card h-100">
            <div>
                <div class="dark-card-title">Gains Totaux Globaux</div>
                <div class="dark-card-value text-success">+<?= number_format($total_general, 2, ',', ' ') ?> Ar</div>
            </div>
            <div class="bg-white rounded-circle p-2 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; color: #1a1b22;">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3zm1 0v10h12V3H2z"/><path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="custom-card h-100 d-flex flex-column justify-content-center m-0">
            <h5 class="custom-card-title mb-1">Résumé des opérations</h5>
            <p class="text-muted small mb-0">Les gains sont générés par les frais prélevés sur les retraits et les transferts.</p>
        </div>
    </div>
</div>

<div class="custom-card p-4">
    <h5 class="custom-card-title mb-4">Détails des gains par type</h5>
    
    <div class="row">
        <?php if(isset($gains) && !empty($gains)): ?>
            <?php foreach($gains as $g): ?>
            <div class="col-md-6">
                <div class="history-item mb-3 p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-box">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5z"/></svg>
                        </div>
                        <div>
                            <div class="history-item-title"><?= ucfirst($g['type_operation']) ?></div>
                            <div class="history-item-subtitle"><?= $g['nombre_operations'] ?> opérations effectuées</div>
                        </div>
                    </div>
                    <div class="history-item-amount text-success fs-5">
                        +<?= number_format($g['gain_total'], 2, ',', ' ') ?> Ar
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center p-5 text-muted">
                Aucun gain enregistré pour le moment.
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
