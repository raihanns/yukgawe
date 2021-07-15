<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Edit Gawe | wePlan</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('gawe'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Gawe</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Gawe / Event</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('gawe/' . $gawe->id_gawe); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="">Nama Gawe / Event *</label>
                        <input type="text" name="name_gawe" value="<?= $gawe->name_gawe; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Gawe *</label>
                        <input type="date" name="date_gawe" value="<?= $gawe->date_gawe; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Info Gawe</label>
                        <textarea name="info_gawe" class="form-control"><?= $gawe->info_gawe; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>