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

          <!-- TAMPILAN SUKSES -->
          <?= $this->session->flashdata('message');  ?>
          <!-- END TAMPILAN SUKSES -->

          <div class="row">
            <div class="col">
              <a href="<?= base_url('Student/ExportToPdf') ?>" target="_blank" class="au-btn au-btn-icon au-btn--green mb-3"><i class="far fa-fw fa-file-pdf"></i>View PDF</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Academic Subject Name</th>
                  <th>Task Score 1</th>
                  <th>Task Score 2</th>
                  <th>Task Score 3</th>
                  <th>Mid-Semester Score</th>
                  <th>End-Semester Score</th>
                  <th>Final Score</th>
                  <th>Grade</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php
                $AmbilData = $this->db->get_where('raport', ['Email' => $this->session->userdata('Email')])->row_array();
                $queryRaport = "  SELECT * FROM raport
                            WHERE Email = '$AmbilData[Email]'
                            ORDER BY Matapelajaran_ID ASC
                        ";
                $Raport = $this->db->query($queryRaport)->result_array();
                ?>
                <?php foreach ($Raport as $R) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $R['Matapelajaran_ID']; ?></td>
                    <td><?= $R['Nilai_Tugas_1']; ?></td>
                    <td><?= $R['Nilai_Tugas_2']; ?></td>
                    <td><?= $R['Nilai_Tugas_3']; ?></td>
                    <td><?= $R['Nilai_UTS']; ?></td>
                    <td><?= $R['Nilai_UAS']; ?></td>
                    <td><?= $R['Nilai_Akhir']; ?></td>
                    <td><?= $R['Predikat']; ?></td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

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