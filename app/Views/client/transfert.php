<?php $title = 'Faire un transfert'; ?>

<?= $this->extend('client/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6">

        <div class="custom-card">

            <h5 class="custom-card-title">
                Nouveau transfert multiple
            </h5>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>


            <form action="<?= site_url('client/transfert/ajout') ?>" method="get">


                <div class="mb-4">

                    <label class="form-label text-muted small fw-bold">
                        MONTANT TOTAL À TRANSFÉRER (Ar)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        class="form-control bg-light border-0 py-3 fs-5 fw-bold"
                        name="montant"
                        required
                        placeholder="10000">

                </div>



                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">
                        NUMÉROS DESTINATAIRES
                    </label>
                    <textarea
                        class="form-control bg-light border-0 py-3 fw-bold"
                        name="numeros"
                        rows="6"
                        required
                        placeholder=""></textarea>

                    <small class="text-muted">
                        Un numéro par ligne
                    </small>
                </div>
                <button
                    type="submit"
                    class="btn btn-custom w-100 py-3 fw-bold rounded-pill">
                    Valider le transfert
                </button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>