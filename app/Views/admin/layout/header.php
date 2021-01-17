<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Perpustakaan">
    <meta name="author" content="Fikri">
    <meta name="keywords" content="Perpustakaan">

    <!-- Title Page-->
    <title>Admin Perpustakaan | <?= $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="admin/css/theme.css" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?= base_url('adm'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url('adm_katalog'); ?>">
                                <i class="fas fa-chart-bar"></i>Katalog</a>
                        </li>
                        <li>
                            <a href="<?= base_url('adm_rak'); ?>">
                                <i class="fas fa-chart-donut"></i>Rak</a>
                        </li>
                        <li>
                            <a href="<?= base_url('adm_user'); ?>">
                                <i class="fas fa-user"></i>User</a>
                        </li>
                        <li>
                            <a href="<?= base_url('adm_history'); ?>">
                                <i class="fas fa-table"></i>History</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?= base_url('adm'); ?>">
                    <img src="admin/images/logo.png" alt="Cool Admin" style="width: 70px; height: 70px;" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                      <li>
                          <a href="<?= base_url('adm'); ?>">
                              <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url('adm_katalog'); ?>">
                              <i class="fas fa-chart-bar"></i>Katalog</a>
                      </li>
                      <li>
                          <a href="<?= base_url('adm_rak'); ?>">
                              <i class="fas fa-book"></i>Rak</a>
                      </li>
                      <li>
                          <a href="<?= base_url('adm_user'); ?>">
                              <i class="fas fa-user"></i>User</a>
                      </li>
                      <li>
                          <a href="<?= base_url('adm_history'); ?>">
                              <i class="fas fa-table"></i>History</a>
                      </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $user['nama']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <h5 class="name">
                                                    <?= $user['nama']; ?>
                                                </h5>
                                                <span class="email"><?= $user['telp']; ?></span>
                                            </div>
                                            <!-- <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div> -->
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('logout')?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
