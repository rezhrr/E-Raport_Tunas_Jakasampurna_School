<!-- PAGE CONTAINER-->
<div class="page-container">
  <!-- HEADER DESKTOP-->
  <header class="header-desktop">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="header-wrap">
          <form class="form-header">
          </form>
          <div class="header-button">
            <div class="account-wrap">
              <div class="account-item clearfix js-item-menu">
                <div class="image">
                  <img src="<?= base_url('assets/foto_tjs/profile/') . $pengguna['Foto']; ?> " />
                </div>
                <div class="content">
                  <a class="js-acc-btn" href="#"><?= $pengguna['Nama']; ?></a>
                </div>
                <div class="account-dropdown js-dropdown">
                  <div class="info clearfix">
                    <div class="image">
                      <a href="<?= base_url('Settings/MyProfile'); ?>">
                        <img src="<?= base_url('assets/foto_tjs/profile/') . $pengguna['Foto']; ?> " />
                      </a>
                    </div>
                    <div class=" content">
                      <h5 class="name">
                        <a href="<?= base_url('Settings/MyProfile'); ?>"><?= $pengguna['Nama']; ?></a>
                      </h5>
                      <span class="email"><?= $pengguna['Email']; ?> </span>
                    </div>
                  </div>
                  <div class="account-dropdown__body">
                    <div class="account-dropdown__item">
                      <a href="<?= base_url('Settings/MyProfile'); ?>" data-toggle="modal" data-target="#mediumModal">
                        <i class="zmdi zmdi-account"></i>My Profile</a>
                    </div>
                    <div class="account-dropdown__item">
                      <a href="<?= base_url('Settings/EditProfile'); ?>" data-toggle="modal" data-target="#mediumModal">
                        <i class="zmdi zmdi-edit"></i>Edit Profile</a>
                    </div>
                    <div class="account-dropdown__item">
                      <a href="<?= base_url('Settings/UbahPassword'); ?>" data-toggle="modal" data-target="#mediumModal">
                        <i class="zmdi zmdi-key"></i>Change Password</a>
                    </div>
                  </div>
                  <div class="account-dropdown__footer">
                    <a data-toggle="modal" href="<?= base_url('Auth/Logout'); ?>" data-target="#mediumModal"> <i class="zmdi zmdi-power"></i>Logout</a>
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