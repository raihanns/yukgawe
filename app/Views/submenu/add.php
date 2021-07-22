<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('submenu'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Submenu</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Menu</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url('submenu'); ?>">Submenu Management</a></div>
            <div class="breadcrumb-item"><a>Add Submenu</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Add Submenu</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('submenu'); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="">Nama Submenu</label>
                        <input type="text" name="title" class="form-control" required autofocus>
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
                        <input type="text" name="url" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input type="text" name="icon" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" value="1" name="is_active" class="custom-control-input" id="is_active" checked>
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