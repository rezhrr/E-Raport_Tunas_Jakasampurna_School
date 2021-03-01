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
        <div class="col-sm-12">
          <a href="<?= base_url('Teacher/InputDataOrangTua') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
        </div>
      </div>

      <div class="row">
        <!-- TABLE FATHER -->
        <div class="col-sm-6">
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <input type="hidden" name="ID" value="<?= $OrangTua['ID']; ?>">
              <tr>
                <td><strong>Father Name</strong></td>
                <td><?= $OrangTua['Nama_Bapak']; ?> </td>
              </tr>
              <tr>
                <td><strong>Date of Birth</strong></td>
                <td><?= changeDateFormat('d-M-Y', $OrangTua['Tanggal_Lahir_Bapak']); ?> </td>
              </tr>
              <tr>
                <td><strong>Place of Birth</strong></td>
                <td><?= $OrangTua['Tempat_Lahir_Bapak']; ?> </td>
              </tr>
              <tr>
                <td><strong>Religion</strong></td>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $OrangTua['Agama_Bapak']) : ?>
                    <td>
                      <?= $A; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Last Education</strong></td>
                <td><?= $OrangTua['Pendidikan_Bapak']; ?> </td>
              </tr>
              <tr>
                <td><strong>Profession</strong></td>
                <td><?= $OrangTua['Pekerjaan_Bapak']; ?> </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- END TABLE FATHER -->

        <!-- TABLE MOTHER-->
        <div class="col-sm-6">
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <input type="hidden" name="ID" value="<?= $OrangTua['ID']; ?>">
              <tr>
                <td><strong>Mother Name</strong></td>
                <td><?= $OrangTua['Nama_Ibu']; ?> </td>
              </tr>
              <tr>
                <td><strong>Date of Birth</strong></td>
                <td><?= changeDateFormat('d-M-Y', $OrangTua['Tanggal_Lahir_Ibu']); ?> </td>
              </tr>
              <tr>
                <td><strong>Place of Birth</strong></td>
                <td><?= $OrangTua['Tempat_Lahir_Ibu']; ?> </td>
              </tr>
              <tr>
                <td><strong>Religion</strong></td>
                <?php foreach ($Agama as $A) : ?>
                  <?php if ($A == $OrangTua['Agama_Ibu']) : ?>
                    <td>
                      <?= $A; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Last Education</strong></td>
                <td><?= $OrangTua['Pendidikan_Ibu']; ?> </td>
              </tr>
              <tr>
                <td><strong>Profession</strong></td>
                <td><?= $OrangTua['Pekerjaan_Ibu']; ?> </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- END TABLE MOTHER -->
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <tr>
                <td><strong>Parents Address</strong></td>
                <td><?= $OrangTua['Alamat_Orangtua']; ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <!-- END ISI -->
    </div>
  </div>
</div>
<!-- END MAIN CONTENT-->

<!-- Button trigger modal -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>