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
        <divL class="col-lg-10">
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
          <?= form_open_multipart('Teacher/EditInputDataSiswa/' . $Siswaa['ID']); ?>
          <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
          <div class="row">
            <div class="col">
              <a href="<?= base_url('Teacher/InputDataSiswa') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
            </div>
          </div>
          <input type="hidden" name="ID" value="<?= $Siswaa['ID']; ?>">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIS</label>
              <input type="text" class="form-control" name="nis" value="<?= $Siswaa['NIS']; ?>" readonly>
            </div>
            <div class="form-group col-md-8">
              <label>Student Name</label>
              <input type="text" class="form-control" name="namasiswa" value="<?= $Siswaa['Nama_Siswa']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Gender</label>
              <select name="jeniskelamin" class="form-control">
                <?php foreach ($JenisKelamin as $JK) : ?>
                  <?php if ($JK == $Siswaa['Jenis_Kelamin']) : ?>
                    <option value="<?= $JK; ?>" selected><?= $JK; ?></option>
                  <?php else : ?>
                    <option value="<?= $JK; ?>"><?= $JK; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Place of Birth</label>
              <input type="text" class="form-control" name="tempatlahir" value="<?= $Siswaa['Tempat_Lahir']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Date of Birth</label>
              <input type="date" class="form-control" name="tanggallahir" value="<?= $Siswaa['Tanggal_Lahir']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Religion</label>
              <select name="agama" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $Siswaa['Agama']) : ?>
                    <option value="<?= $A; ?>" selected><?= $A; ?></option>
                  <?php else : ?>
                    <option value="<?= $A; ?>"><?= $A; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="<?= $Siswaa['Email']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label>Telepon</label>
              <input type="text" class="form-control" name="telepon" value="<?= $Siswaa['Telepon']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Address</label>
              <input type="text" class="form-control" name="alamat" value="<?= $Siswaa['Alamat']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/foto_tjs/student/') . $Siswaa['Foto']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <label>Parent Name</label>
                      <select name="orangtua_id" class="form-control">
                        <option value="">Select Parent</option>
                        <?php foreach ($OrangTua as $OT) : ?>
                          <?php if ($OT['ID'] == $Siswaa['Orangtua_ID']) : ?>
                            <option value="<?= $OT['ID']; ?>" selected><?= $OT['Nama_Bapak']; ?></option>
                          <?php else : ?>
                            <option value="<?= $OT['ID']; ?>"><?= $OT['Nama_Bapak']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row justify-content-end mt-4">
                    <div class="col-sm-4">
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