<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Home | KKP</title>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <!-- isi -->
        <div class="hero bg-primary text-white">
            <div class="hero-inner">
                <h2>Welcome Back, <?= $user->name; ?>!</h2>
                <p class="lead">This is a dashboard page.</p>
            </div>
        </div>

        <!-- tutup isi -->
    </div>
</section>
<?= $this->endSection(); ?>