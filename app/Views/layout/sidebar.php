<li class="menu-header">Main Menu</li>
<li class="active"><a class="nav-link" href="<?= site_url(); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li class=""><a class="nav-link" href="<?= site_url('gawe'); ?>"><i class="far fa-calendar"></i> <span>Event</span></a></li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-address-book"></i><span>Menu Management</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= base_url('menu'); ?>">Menu</a></li>
        <li><a class="nav-link" href="<?= base_url('submenu'); ?>">Submenu</a></li>
    </ul>
</li>
<li class="menu-header">Menu</li>
<li class=""><a class="nav-link" href="<?= base_url('menu'); ?>"><i class="far fa-folder"></i> <span>Menu Management</span></a>
<li class=""><a class="nav-link" href="<?= base_url('submenu'); ?>"><i class="far fa-folder-open"></i> <span>Submenu Management</span></a>

<li class="menu-header">Settings</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Profile</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="index-0.html">My Profile</a></li>
        <li><a class="nav-link" href="index.html">Edit Profile</a></li>
        <li><a class="nav-link" href="index.html">Change Password</a></li>
    </ul>
</li>