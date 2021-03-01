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
          <?= form_open_multipart('Teacher/EditInputDataOrangTua/' . $OrangTua['ID']); ?>
          <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
          <input type="hidden" name="ID" value="<?= $OrangTua['ID']; ?>">

          <div class="row">
            <div class="col-sm-12">
              <a href="<?= base_url('Teacher/InputDataOrangTua') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col">
              <h4>
                <strong>
                  <center>Father Data</center>
                </strong>
              </h4>
              <hr class="border-bottom-info">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Father Name</label>
              <input type="text" class="form-control" name="nama_b" value="<?= $OrangTua['Nama_Bapak']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Father Birthplace</label>
              <input type="text" class="form-control" name="tempatlahir_b" value="<?= $OrangTua['Tempat_Lahir_Bapak']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Father Birthday</label>
              <input type="date" class="form-control" name="tanggallahir_b" value="<?= $OrangTua['Tanggal_Lahir_Bapak']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Father Religion</label>
              <select name="agama_b" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $OrangTua['Agama_Bapak']) : ?>
                    <option value="<?= $A; ?>" selected><?= $A; ?></option>
                  <?php else : ?>
                    <option value="<?= $A; ?>"><?= $A; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Father Last Education</label>
              <select name="pendidikan_b" class="form-control">
                <option value="">Select Last Education</option>
                <?php foreach ($Pendidikan as $Pend) : ?>
                  <?php if ($Pend == $OrangTua['Pendidikan_Bapak']) : ?>
                    <option value="<?= $Pend; ?>" selected><?= $Pend; ?></option>
                  <?php else : ?>
                    <option value="<?= $Pend; ?>"><?= $Pend; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Father Profession</label>
              <select name="pekerjaan_b" class="form-control">
                <option value="">Select Profession</option>
                <?php foreach ($Pekerjaan as $Peker) : ?>
                  <?php if ($Peker == $OrangTua['Pekerjaan_Bapak']) : ?>
                    <option value="<?= $Peker; ?>" selected><?= $Peker; ?></option>
                  <?php else : ?>
                    <option value="<?= $Peker; ?>"><?= $Peker; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col">
              <h4>
                <strong>
                  <center>Mother Data</center>
                </strong>
              </h4>
              <hr class="border-bottom-info">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Mother Name</label>
              <input type="text" class="form-control" name="nama_i" value="<?= $OrangTua['Nama_Ibu']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Mother Birthplace</label>
              <input type="text" class="form-control" name="tempatlahir_i" value="<?= $OrangTua['Tempat_Lahir_Ibu']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Mother Birthday</label>
              <input type="date" class="form-control" name="tanggallahir_i" value="<?= $OrangTua['Tanggal_Lahir_Ibu']; ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Mother Religion</label>
              <select name="agama_i" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $OrangTua['Agama_Ibu']) : ?>
                    <option value="<?= $A; ?>" selected><?= $A; ?></option>
                  <?php else : ?>
                    <option value="<?= $A; ?>"><?= $A; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Mother Last Education</label>
              <select name="pendidikan_i" class="form-control">
                <option value="">Select Last Education</option>
                <?php foreach ($Pendidikan as $Pend) : ?>
                  <?php if ($Pend == $OrangTua['Pendidikan_Ibu']) : ?>
                    <option value="<?= $Pend; ?>" selected><?= $Pend; ?></option>
                  <?php else : ?>
                    <option value="<?= $Pend; ?>"><?= $Pend; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Mother Profession</label>
              <select name="pekerjaan_i" class="form-control">
                <option value="">Select Profession</option>
                <?php foreach ($Pekerjaan as $Peker) : ?>
                  <?php if ($Peker == $OrangTua['Pekerjaan_Ibu']) : ?>
                    <option value="<?= $Peker; ?>" selected><?= $Peker; ?></option>
                  <?php else : ?>
                    <option value="<?= $Peker; ?>"><?= $Peker; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Parents Address</label>
              <input type="text" class="form-control" name="alamat_ortu" value="<?= $OrangTua['Alamat_Orangtua']; ?>">
            </div>
          </div>

          <div class="form-group row justify-content-end mt-3">
            <div class="col-lg-2">
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