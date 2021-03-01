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
        <div class="col-lg-8">
          <?= form_open_multipart('Settings/EditProfile'); ?>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email" value="<?= $pengguna['Email']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" value="<?= $pengguna['Nama']; ?>">
              <!-- COMENT ERROR JIKA DATA KOSONG -->
              <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/foto_tjs/profile/') . $pengguna['Foto']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto">
                    <label class="custom-file-label" for="foto">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row justify-content-end">
            <div class="col-sm-10">
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