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
        <div class="col-sm-9">
          <div class="row">
            <div class="col">
              <a href="<?= base_url('Admin/Pembayaran') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <input type="hidden" name="ID" value="<?= $Pembayarann['ID']; ?>">
              <tr>
                <td><strong>Payment Code</strong></td>
                <td><?= $Pembayarann['Kode_Pembayaran']; ?> </td>
              </tr>
              <tr>
                <td><strong>Student Name</strong></td>
                <td><?= $Pembayarann['Nama_Siswa']; ?> </td>
              </tr>
              <tr>
                <td><strong>Payment Name</strong></td>
                <td><?= $Pembayarann['Nama_Pembayaran']; ?> </td>
              </tr>
              <tr>
                <td><strong>Type of Payment</strong></td>
                <?php foreach ($Jenis_Pembayaran as $JP) : ?>
                  <?php if ($JP == $Pembayarann['Jenis_Pembayaran']) : ?>
                    <td>
                      <?= $JP; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Payment Name</strong></td>
                <td>Rp. <?= $Pembayarann['Jumlah_Pembayaran']; ?></td>
              </tr>
              <tr>
                <td><strong>Payment Date</strong></td>
                <td><?= changeDateFormat('d F Y', $Pembayarann['Tanggal_Pembayaran']); ?> </td>
              </tr>

            </table>
          </div>
        </div>
      </div>
      <!-- END USER DATA-->
    </div>
  </div>
  <!-- END ISI -->
</div>
<!-- END MAIN CONTENT-->

<!-- Button trigger modal -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>