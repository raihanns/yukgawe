<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Groups | KKP</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Groups</h1>
        <div class="section-header-button">
            <a href="<?= base_url('groups/new'); ?>" class="btn btn-primary">Add New</a>
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
                <h4>Data Grup Kontak</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Nama groups</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($groups as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->name_group; ?></td>
                                <td><?= $value->info_group; ?></td>
                                <td class="text-center" style="width: 15%;">
                                    <a href="<?= base_url('gawe/edit/' . $value->id_group); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form class="d-inline" action="<?= base_url('group/' . $value->id_group); ?>" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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