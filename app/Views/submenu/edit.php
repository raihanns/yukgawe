<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('submenu'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Submenu</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Submenu</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('submenu/' . $submenu->id); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="">Nama Submenu</label>
                        <input type="text" name="title" value="<?= $submenu->title; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $key => $value) : ?>
                                <option value="<?= $value->id; ?>"> <?= $value->menu; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">URL</label>
                        <input type="text" name="url" value="<?= $submenu->url; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input type="text" name="icon" value="<?= $submenu->icon; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" value="<?= $submenu->is_active; ?>" name="is_active" class="custom-control-input" id="is_active" <?php if ($submenu->is_active == 1) echo 'checked' ?>>
                            <label for="is_active" class="custom-control-label">Active?</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>