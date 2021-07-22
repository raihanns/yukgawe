<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Edit Role Access | KKP</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('gawe'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Role Access</h1>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Role: <?= $role->role; ?></h4>
            </div>


            <div class="card-body table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Access</th>
                        </tr>
                        <?php foreach ($menu as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->menu; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?= check_access($role->id, $value->id); ?> data-role="<?= $role->id; ?>" data-menu="<?= $value->id ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>