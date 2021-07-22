<?php
$this->db      = \Config\Database::connect();
$this->session = session();
$role_id = session('role_id');
$query = $this->db->query("
SELECT `user_menu`.`id`,`menu`
FROM `user_menu` JOIN `user_access_menu`
ON    `user_menu`.`id` = `user_access_menu`.`menu_id`
WHERE `user_access_menu`.`role_id` = $role_id
ORDER BY `user_access_menu`.`menu_id` ASC 
");
$menu = $query->getResult();
?>

<?php foreach ($menu as $key => $value) : ?>
    <li class="menu-header"><?= $value->menu; ?></li>

    <?php
    $menuId = $value->id;
    $query = $this->db->query("
    SELECT *
    FROM `user_sub_menu` JOIN `user_menu`
    ON   `user_sub_menu`.`menu_id` = `user_menu`.`id`
    WHERE `user_sub_menu`.`menu_id` = $menuId
    AND   `user_sub_menu`.`is_active` = 1
    ");
    $submenu = $query->getResult();
    ?>

    <?php foreach ($submenu as $key => $value) : ?>
        <?php if ($title == $value->title) : ?>
            <li class="active">
            <?php else : ?>
            <li>
            <?php endif; ?>


            <a class="nav-link" href="<?= site_url($value->url); ?>">
                <i class="<?= $value->icon; ?>"></i>
                <span><?= $value->title; ?></span>
            </a>
            </li>


        <?php endforeach; ?>




    <?php endforeach; ?>






    <!-- <li class=""><a class="nav-link" href="<?= site_url('gawe'); ?>"><i class="far fa-calendar"></i> <span>Event</span></a></li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-address-book"></i><span>Kontak</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= base_url('groups'); ?>">Grup Kontak</a></li>
        <li><a class="nav-link" href="<?= base_url('submenu'); ?>">Kontak Saya</a></li>
    </ul>
</li>
<li class="menu-header">Admin</li>
<li class="active"><a class="nav-link" href="<?= site_url('admin/index'); ?>"><i class="fas fa-user-tag"></i> <span>User Role</span></a></li>
<li class="menu-header">Menu</li>
<li class=""><a class="nav-link" href="<?= base_url('menu'); ?>"><i class="far fa-folder"></i> <span>Menu Management</span></a>
<li class=""><a class="nav-link" href="<?= base_url('submenu'); ?>"><i class="far fa-folder-open"></i> <span>Submenu Management</span></a>

<li class="menu-header">Settings</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Profile</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= base_url('user'); ?>">My Profile</a></li>
        <li><a class="nav-link" href="<?= base_url('user/edit/' . $user->id); ?>">Edit Profile</a></li>
        <li><a class="nav-link" href="<?= base_url('user/changepassword'); ?>">Change Password</a></li>
    </ul>
</li> -->