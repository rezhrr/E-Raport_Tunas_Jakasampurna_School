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
              <a href="<?= base_url('Admin/MataPelajaran') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <input type="hidden" name="ID" value="<?= $MataPelajarann['ID']; ?>">
              <tr>
                <td><strong>Academic Subject Code</strong></td>
                <td><?= $MataPelajarann['Kode_Mapel']; ?> </td>
              </tr>
              <tr>
                <td><strong>Academic Subject Name</strong></td>
                <td><?= $MataPelajarann['Nama_Mapel']; ?> </td>
              </tr>
              <tr>
                <td><strong>JP</strong></td>
                <?php foreach ($SKS as $S) : ?>
                  <?php if ($S == $MataPelajarann['JP']) : ?>
                    <td>
                      <?= $S; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
              <tr>
                <td><strong>Teacher</strong></td>
                <?php foreach ($Guru as $G) : ?>
                  <?php if ($G['ID'] == $MataPelajarann['Guru_ID']) : ?>
                    <td>
                      <?= $G['Nama_Guru']; ?>
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
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