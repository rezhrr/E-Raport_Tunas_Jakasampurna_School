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
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <input type="hidden" name="ID" value="<?= $PersonalSiswa['ID']; ?>">
              <tr>
                <td><strong>NIS</strong></td>
                <td><?= $PersonalSiswa['NIS']; ?> </td>
              </tr>
              <tr>
                <td><strong>Student Name</strong></td>
                <td><?= $PersonalSiswa['Nama_Siswa']; ?> </td>
              </tr>
              <tr>
                <td><strong>Gender</strong></td>
                <?php foreach ($JenisKelamin as $JK) : ?>
                  <?php if ($JK == $PersonalSiswa['Jenis_Kelamin']) : ?>
                    <td>
                      <?= $JK; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Place Of Birth</strong></td>
                <td><?= $PersonalSiswa['Tempat_Lahir']; ?> </td>
              </tr>
              <tr>
                <td><strong>Date Of Birth</strong></td>
                <td><?= changeDateFormat('d-M-Y', $PersonalSiswa['Tanggal_Lahir']); ?> </td>
              </tr>
              <tr>
                <td><strong>Religion</strong></td>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $PersonalSiswa['Agama']) : ?>
                    <td>
                      <?= $A; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td><?= $PersonalSiswa['Email']; ?> </td>
              </tr>
              <tr>
                <td><strong>Telepon</strong></td>
                <td><?= $PersonalSiswa['Telepon']; ?> </td>
              </tr>
              <tr>
                <td><strong>Parent Name</strong></td>
                <?php foreach ($OrangTua as $OT) : ?>
                  <?php if ($OT['ID'] == $PersonalSiswa['Orangtua_ID']) : ?>
                    <td>
                      <?= $OT['Nama_Bapak']; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td><?= $PersonalSiswa['Alamat']; ?> </td>
              </tr>
              <tr>
                <td><strong>Picture</strong></td>
                <td><img src="<?= base_url('assets/foto_tjs/student/') . $PersonalSiswa['Foto']; ?>" class="img-thumbnail" width="200px"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- END ISI -->

  </div>
</div>
<!-- END MAIN CONTENT-->

<!-- Button trigger modal -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>