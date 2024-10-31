<?php $session = session();?>

<header>
    <div class="header-container">
        <div class="menu-toggle" id="mobile-menu">
            <i class="fas fa-bars"></i>
        </div>
        <h1 class="header-title"><?= esc($session->get('name')); ?></h1>
    </div>
</header>

<div class="dashboard-nav">
    <!-- list dashboard -->
    <nav class="dashboard-nav-list">
        <a href="#" class="brand-logo">
            <img src="<?=base_url('img/imma.png')?>" alt="">
        </a>
        <a href="<?=base_url('home')?>" class="dashboard-nav-item <?= ($_SERVER['REQUEST_URI'] == '/home') ? 'active' : '' ?>"><i class="fas fa-home"></i>Home</a>
        <a href="<?=base_url('dashboard')?>" class="dashboard-nav-item <?= ($_SERVER['REQUEST_URI'] == '/dashboard') ? 'active' : '' ?>"><i class="fa-solid fa-table"></i>Dashboard</a>
        <a href="<?=base_url('createticket')?>" class="dashboard-nav-item <?= ($_SERVER['REQUEST_URI'] == '/createticket') ? 'active' : '' ?>"><i class="fas fa-file-upload"></i> Create Ticket </a>
        <a href="<?=base_url('register')?>" class="dashboard-nav-item <?= ($_SERVER['REQUEST_URI'] == '/register') ? 'active' : '' ?>"><i class="fas fa-plus"></i> Create User </a>
        <a href="<?=base_url('settings')?>" class="dashboard-nav-item <?= ($_SERVER['REQUEST_URI'] == '/settings') ? 'active' : '' ?>"><i class="fas fa-user"></i> User Profile </a>
        <div class="nav-item-divider"></div>
        <a href="<?=base_url('logout')?>" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
    </nav>
</div>
