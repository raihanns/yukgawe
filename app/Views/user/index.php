<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>My Profile</h1>
    </div>

    <div class="section-body">
        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="<?= base_url('template/assets/img/avatar/' . $user->image); ?>" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <a href="<?= base_url('user/edit/' . $user->id); ?>" class="btn btn-primary mt-3">Edit Profile</a>
                </div>
                <div class="author-box-details">
                    <div class="author-box-name">
                        <a href=""><?= $user->name; ?></a>
                    </div>
                    <div class="author-box-job">
                        <?php if ($user->role_id == 1) {
                            print_r('Administrator');
                        } else {
                            print_r('Member');
                        }
                        ?>
                    </div>
                    <div class="author-box-description">
                        <p><?= $user->email; ?></p>
                    </div>
                    <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold">Member since <?= date('d F Y', $user->date_created); ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>