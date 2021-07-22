<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('menu'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Menu Management</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Menu</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu Management</a></div>
            <div class="breadcrumb-item"><a>Add Menu</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Menu</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('menu/' . $menu->id); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="">Nama Menu</label>
                        <input type="text" name="menu" value="<?= $menu->menu; ?>" class="form-control" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>