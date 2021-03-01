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
          <form action="<?= base_url('Teacher/EditInputNilaiSiswa/') . $NilaiSiswa['ID']; ?>" method="post" enctype="multipart/form-data">
            <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
            <input type="hidden" name="ID" value="<?= $NilaiSiswa['ID']; ?>">
            <div class=" form-group row">
              <label class="col-sm-5 col-form-label">NIS</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nis" value="<?= $NilaiSiswa['NIS']; ?>" readonly>
              </div>
            </div>
            <div class=" form-group row">
              <label class="col-sm-5 col-form-label">Student Name</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="namasiswa" value="<?= $NilaiSiswa['Nama_Siswa']; ?>" readonly>
              </div>
            </div>
            <div class=" form-group row">
              <label class="col-sm-5 col-form-label">Class Name</label>
              <div class="col-lg-7">
                <select name="kelas_id" class="form-control" readonly>
                  <?php foreach ($Kelas as $K) : ?>
                    <?php if ($K['Kode_Kelas'] == $NilaiSiswa['Kelas_ID']) : ?>
                      <option value="<?= $K['Kode_Kelas']; ?>" selected><?= $K['Kode_Kelas']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Academic Subject Name</label>
              <div class="col-lg-7">
                <select name="matapelajaran_id" class="form-control" readonly>
                  <?php foreach ($MataPelajaran as $K) : ?>
                    <?php if ($K['Nama_Mapel'] == $NilaiSiswa['Matapelajaran_ID']) : ?>
                      <option value="<?= $K['Nama_Mapel']; ?>" selected><?= $K['Nama_Mapel']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Semester</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="semester" value="<?= $NilaiSiswa['Semester']; ?>" readonly>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Select Semester</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="tahun_akademik" value="<?= $NilaiSiswa['Tahun_Akademik']; ?>" readonly>
              </div>
            </div>

            <hr>

            <div class="form-group row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">Score Student</h2>
                </div>
              </div>
              <label class="col-sm-5 col-form-label">Task Score 1</label>
              <div class="col-lg-7">
                <input type="number" class="form-control" name="nilaitugas1" value="<?= $NilaiSiswa['Nilai_Tugas_1']; ?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Task Score 2</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nilaitugas2" value="<?= $NilaiSiswa['Nilai_Tugas_2']; ?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Task Score 3</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nilaitugas3" value="<?= $NilaiSiswa['Nilai_Tugas_3']; ?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Mid-Semester Score</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nilaiuts" value="<?= $NilaiSiswa['Nilai_UTS']; ?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">End-Semester Score</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nilaiuas" value="<?= $NilaiSiswa['Nilai_UAS']; ?>">
              </div>
            </div>





            <div class="form-group row justify-content-end">
              <div class="col-lg-7">
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