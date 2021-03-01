<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?> </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <strong class="card-title mb-3">Profile Card</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" src="<?= base_url('assets/foto_tjs/profile/') . $pengguna['Foto']; ?>" width="100" length="100" />
                <h4 class="text-sm-center mt-2 mb-1"><?= $pengguna['Nama']; ?> </h4>
                <div class="location text-sm-center">
                  <?= $pengguna['Email']; ?>
                </div>
              </div>
              <hr />
              <div class="card-text text-sm-center">
                <p> Member since
                  <?= date('d F Y', $pengguna['Waktu_Dibuat']); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END MAIN CONTENT-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>