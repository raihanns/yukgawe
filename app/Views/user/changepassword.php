<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('user'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Profile</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profile</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('user/' . $user->id); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="">Current Password *</label>
                        <input type="text" name="current_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">New Password *</label>
                        <input type="text" name="new_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>