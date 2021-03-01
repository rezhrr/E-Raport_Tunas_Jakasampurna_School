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
        <div class="col-lg-7">
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
          <form action="<?= base_url('Admin/EditPembayaran/') . $Pembayarann['ID']; ?>" method="post" enctype="multipart/form-data">
            <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
            <input type="hidden" name="ID" value="<?= $Pembayarann['ID']; ?>">
            <div class=" form-group row">
              <label class="col-sm-4 col-form-label">Payment Code</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kodepembayaran" value="<?= $Pembayarann['Kode_Pembayaran']; ?>" readonly>
              </div>
            </div>
            <div class=" form-group row">
              <label class="col-sm-4 col-form-label">Student Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="namasiswa" value="<?= $Pembayarann['Nama_Siswa']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Payment Name</label>
              <div class="col-lg-8">
                <input type="text" class="form-control" name="namapembayaran" value="<?= $Pembayarann['Nama_Pembayaran']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Type of Payment</label>
              <div class="col-lg-8">
                <select name="jenispembayaran" class="form-control">
                  <?php foreach ($Jenis_Pembayaran as $JP) : ?>
                    <?php if ($JP == $Pembayarann['Jenis_Pembayaran']) : ?>
                      <option value="<?= $JP; ?>" selected><?= $JP; ?></option>
                    <?php else : ?>
                      <option value="<?= $JP; ?>"><?= $JP; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Payment Amount</label>
              <div class="col-lg-8">
                <input type="number" class="form-control numberic" name="jumlahpembayaran" value="<?= $Pembayarann['Jumlah_Pembayaran']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Payment Date</label>
              <div class="col-lg-8">
                <input type="date" class="form-control" name="tanggalpembayaran" value="<?= $Pembayarann['Tanggal_Pembayaran']; ?>" readonly>
              </div>
            </div>

            <div class="form-group row justify-content-end">
              <div class="col-lg-8">
                <button type="submit" class="au-btn au-btn--blue">Edit</button>
              </div>
            </div>
          </form>

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