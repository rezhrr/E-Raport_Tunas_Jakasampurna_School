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
          <form action="<?= base_url('Admin/EditRancanganNilaiSiswa/') . $LayoutNilai['ID']; ?>" method="post" enctype="multipart/form-data">
            <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
            <input type="hidden" name="ID" value="<?= $LayoutNilai['ID']; ?>">

            <div class="form-group">
              <label>Academic Year</label>
              <select name="tahun_akademik" class="form-control">
                <option value="">Select Academic Year</option>
                <?php foreach ($TahunAkademik as $TA) : ?>
                  <?php if ($TA == $LayoutNilai['Tahun_Akademik']) : ?>
                    <option value="<?= $TA; ?>" selected><?= $TA; ?></option>
                  <?php else : ?>
                    <option value="<?= $TA; ?>"><?= $TA; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Semester</label>
              <select name="semester_id" class="form-control">
                <option value="">Select Semester</option>
                <?php foreach ($Tahun_Akademik as $TAS) : ?>
                  <?php if ($TAS['ID'] == $LayoutNilai['Semester_ID']) : ?>
                    <option value="<?= $TAS['ID']; ?>" selected><?= $TAS['Semester']; ?></option>
                  <?php else : ?>
                    <option value="<?= $TAS['ID']; ?>"><?= $TAS['Semester']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>NIS</label>
              <input type="text" class="form-control" name="nis" placeholder="NIS" value="<?= $LayoutNilai['NIS']; ?>">
            </div>

            <div class="form-group">
              <label>Academic Subject Code</label>
              <select name="matapelajaran_id" class="form-control">
                <option value="">Select Academic Code</option>
                <?php foreach ($Mata_Pelajaran as $MP) : ?>
                  <?php if ($MP['ID'] == $LayoutNilai['Matapelajaran_ID']) : ?>
                    <option value="<?= $MP['ID']; ?>" selected><?= $MP['Kode_Mapel']; ?></option>
                  <?php else : ?>
                    <option value="<?= $MP['ID']; ?>"><?= $MP['Kode_Mapel']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- END COMBOBOX FORM -->

            <div class="form-group row justify-content-end">
              <div class="col-lg-12">
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