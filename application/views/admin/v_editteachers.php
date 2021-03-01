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
        <div class="col-lg-10">
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
          <?= form_open_multipart('Admin/EditGuru/' . $Guru['ID']); ?>
          <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
          <input type="hidden" name="ID" value="<?= $Guru['ID']; ?>">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIG</label>
              <input type="text" class="form-control" name="nig" value="<?= $Guru['NIG']; ?>" readonly>
            </div>
            <div class="form-group col-md-8">
              <label>Teacher Name</label>
              <input type="text" class="form-control" name="namaguru" value="<?= $Guru['Nama_Guru']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Gender</label>
              <select name="jeniskelamin" class="form-control">
                <?php foreach ($JenisKelamin as $JK) : ?>
                  <?php if ($JK == $Guru['Jenis_Kelamin']) : ?>
                    <option value="<?= $JK; ?>" selected><?= $JK; ?></option>
                  <?php else : ?>
                    <option value="<?= $JK; ?>"><?= $JK; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Place of Birth</label>
              <input type="text" class="form-control" name="tempatlahir" value="<?= $Guru['Tempat_Lahir']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Date of Birth</label>
              <input type="date" class="form-control" name="tanggallahir" value="<?= $Guru['Tanggal_Lahir']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Religion</label>
              <select name="agama" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $Guru['Agama']) : ?>
                    <option value="<?= $A; ?>" selected><?= $A; ?></option>
                  <?php else : ?>
                    <option value="<?= $A; ?>"><?= $A; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="<?= $Guru['Email']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Telepon</label>
              <input type="text" class="form-control" name="telepon" value="<?= $Guru['Telepon']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Address</label>
              <input type="text" class="form-control" name="alamat" value="<?= $Guru['Alamat']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/foto_tjs/teacher/') . $Guru['Foto']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto">
                    <label class="custom-file-label" for="foto">Choose file</label>
                  </div>
                  <div class="form-group row justify-content-end mt-5">
                    <div class="col-lg-12">
                      <button type="submit" class="au-btn au-btn--blue">Edit</button>
                    </div>
                  </div>
                </div>
              </div>
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