<?php $title = 'Historique des opérations'; ?>
<?= $this->extend('client/layout') ?>

<?= $this->section('content') ?>
<div class="custom-card p-4">
    <h5 class="custom-card-title mb-4">Vos dernières transactions</h5>
    
    <div class="row">
        <?php if(empty($operations)): ?>
            <div class="col-12 text-center p-5 text-muted">
                Aucune opération trouvée pour ce compte.
            </div>
        <?php else: ?>
            <?php foreach($operations as $op): ?>
            <div class="col-12">
                <div class="history-item">
                    <div class="d-flex align-items-center">
                        <div class="icon-box">
                            <?php if($op->type_operation == 'depot'): ?>
                                <svg width="20" height="20" fill="currentColor" class="text-success" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>
                            <?php elseif($op->type_operation == 'retrait'): ?>
                                <svg width="20" height="20" fill="currentColor" class="text-danger" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/></svg>
                            <?php else: ?>
                                <svg width="20" height="20" fill="currentColor" class="text-primary" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/></svg>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="history-item-title"><?= esc(ucfirst($op->type_operation)) ?></div>
                            <div class="history-item-subtitle">
                                <?= date('d M Y, H:i', strtotime($op->date_operation)) ?>
                                <?php if(!empty($op->destinataire) && $op->destinataire != '-'): ?>
                                 | Vers: <?= esc($op->destinataire) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="history-item-amount <?= $op->type_operation == 'depot' ? 'text-success' : 'text-danger' ?>">
                            <?= $op->type_operation == 'depot' ? '+' : '-' ?><?= number_format($op->montant, 2, ',', ' ') ?> Ar
                        </div>
                        <?php if($op->frais > 0): ?>
                            <div class="small text-muted">Frais: <?= number_format($op->frais, 2, ',', ' ') ?> Ar</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>