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

      <!-- ISI -->
      <div class="row">
        <div class="col-sm-11">

          <!-- SUPAYA MENAMPILKAN ERROR KESERULUHAN-->
          <?php if (validation_errors()) : ?>
            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
              <span class="content-danger"><?= validation_errors(); ?></span>
              <button class=" close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle">
                  </i>
                </span>
              </button>
            </div>
          <?php endif; ?>
          <!-- END SUPAYA MENAMPILKAN ERROR -->

          <!-- TAMPILAN SUKSES -->
          <?= $this->session->flashdata('message');  ?>
          <!-- END TAMPILAN SUKSES -->


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Payment Calender</h5>
            </div>
            <div class="card-body">
              Tunas Jakasampurna High School has a policy about making payments, namely the payment deadline on the <strong> 10th of each month</strong>.
            </div>
          </div>


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Payment History</h5>
            </div>
            <div class="card-body">
              Payment history contains data about the last payment that was paid. You can see the last payment data that you made...
              <div class="row mt-4">
                <div class="col">
                  <a href="<?= base_url('Student/InfoPembayaranHistory') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-arrow-forward"></i> See more!</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- END ISI -->
    </div>
  </div>
</div>
<!-- END MAIN CONTENT-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>