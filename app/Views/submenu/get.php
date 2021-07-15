<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Submenu | KKP</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Submenu Management</h1>
        <div class="section-header-button">
            <a href="<?= base_url('submenu/add'); ?>" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Menu</a></div>
            <div class="breadcrumb-item"><a>Submenu Management</a></div>
        </div>
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
                <h4>Data Submenu</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Nama Submenu</th>
                            <th>Menu</th>
                            <th>URL</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($submenu as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->title; ?></td>
                                <td><?= $value->menu; ?></td>
                                <td><?= $value->url; ?></td>
                                <td><?= $value->icon; ?></td>
                                <td>
                                    <?php if ($value->is_active == 1) { ?>
                                        <div class="badge badge-success">Active</div>
                                    <?php } else { ?>
                                        <div class="badge badge-danger">Not Active</div>
                                    <?php } ?>
                                </td>
                                <td class="text-center" style="width: 15%;">
                                    <a href="<?= base_url('submenu/edit/' . $value->id); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>


                                    <!-- delete button -->
                                    <form class="d-inline" action="<?= base_url('submenu/' . $value->id); ?>" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <!-- end of delete button -->
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