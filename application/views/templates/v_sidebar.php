<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
  <div class="header-mobile__bar">
    <div class="container-fluid">
      <div class="header-mobile-inner">
        <a class="logo">
          <img src="<?= base_url(); ?>assets/foto_tjs/icon/logo-eraport.png" />
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
        <li class="has-sub">
          <a class="js-arrow" href="<?= base_url() . 'User' ?>">
            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li>
          <a href="chart.html">
            <i class="fas fa-fw fa-user"></i>My Profile</a>
        </li>
        <!-- <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Teachers Data</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Teachers</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-users"></i>Show Teachers</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Students Data</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Students</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-users"></i>Show Students</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Payment Data</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Payment</a>
            </li>
            <li>
              <a href="register.html">
                <i class="far fa-fw fa-credit-card"></i>Show Payment</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-book"></i>Raport Data</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Student Attendance</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-edit"></i>Input Student Exam Scores</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-print"></i>Show Raport Data</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-chart-bar"></i>Rating Chart</a>
          <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-users"></i>Students Rating Chart</a>
            </li>
          </ul>
        </li> -->
      </ul>
    </div>
  </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar">
  <div class="logo">
    <a href="#">
      <img src="<?= base_url(); ?>assets/foto_tjs/icon/logo-eraport.png" />
    </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">


        <!-- MELAKUKAN QUERY MENU -->
        <?php
        $HakAkses_ID = $this->session->userdata('HakAkses_ID');
        $queryMenu = "SELECT `pengguna_menu`.`ID` , `Menu`
                          FROM `pengguna_menu` JOIN `pengguna_akses_menu`
                            ON `pengguna_menu`.`ID` = `pengguna_akses_menu`.`Menu_ID`
                        WHERE  `pengguna_akses_menu`.`HakAkses_ID` = $HakAkses_ID
                      ORDER BY `pengguna_akses_menu`.`Menu_ID` ASC
                    ";
        $Menu = $this->db->query($queryMenu)->result_array();
        ?>


        <!-- lOPPING MENU -->
        <?php foreach ($Menu as $M) : ?>
          <div class="sidebar-heading">
            <?= $M['Menu']; ?>
          </div>

          <!-- SIAPKAN SUB-MENU SESUAI MENU-->
          <?php
          $Menu_ID = $M['ID'];
          $querySubMenu = "SELECT *
                              FROM `pengguna_sub_menu`
                            WHERE  `Menu_ID` = $Menu_ID
                              AND  `pengguna_sub_menu`.`Aktifasi` = 1
                            ";
          $SubMenu = $this->db->query($querySubMenu)->result_array();
          ?>

          <?php foreach ($SubMenu as $SM) : ?>
            <?php if ($title == $SM['Title']) : ?>
              <li class="active has-sub">
              <?php else : ?>
              <li class="has-sub">
              <?php endif; ?>
              <a class="js-arrow pb-0" href="<?= base_url($SM['Url']); ?>">
                <i class="<?= $SM['Icon']; ?>"></i><?= $SM['Title']; ?></a>
              </li>
            <?php endforeach; ?>

            <hr class="sidebar-heading">
            </hr>

          <?php endforeach; ?>
          <!-- END LOPPING -->
          <!-- <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Teachers Data</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Teachers</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-users"></i>Show Teachers</a>
            </li>
          </ul>
          </l>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Students Data</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Students</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-users"></i>Show Students</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-database"></i>Payment Data</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Payment</a>
            </li>
            <li>
              <a href="register.html">
                <i class="far fa-fw fa-credit-card"></i>Show Payment</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-book"></i>Raport Data</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-edit"></i>Input Attendance</a>
            </li>
            <li>
              <a href="register.html">
                <i class="fas fa-fw fa-edit"></i>Input Exam Scores</a>
            </li>
            <li>
              <a href="forget-pass.html">
                <i class="fas fa-fw fa-print"></i>Show Raport Data</a>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-fw fa-chart-bar"></i>Rating Chart</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li>
              <a href="login.html">
                <i class="fas fa-fw fa-users"></i>Students Rating</a>
            </li>
          </ul>
        </li> -->
          <ul class="list-unstyled navbar__list">
            <li class="has-sub">
              <a class="js-arrow" href="<?= base_url('Auth/Logout'); ?>"><i class="fas fa-power-off"></i>Logout</a>
            </li>
          </ul>
      </ul>
    </nav>
  </div>
</aside>
<!-- END MENU SIDEBAR-->