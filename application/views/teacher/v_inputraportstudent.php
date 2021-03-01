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

          <!-- USER DATA-->
          <div class="row">
            <div class="col">
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewScoreModal"><i class="zmdi zmdi-plus"></i>Add Raport Student</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Raport</th>
                  <th>NIS</th>
                  <th>Student Name</th>
                  <th>Academic Subject Name</th>
                  <th>Task Score 1</th>
                  <th>Task Score 2</th>
                  <th>Task Score 3</th>
                  <th>Mid-Semester Score</th>
                  <th>End-Semester Score</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php $total = 0; ?>
                <?php foreach ($Raportt as $R) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $R['ID_Raport']; ?> </td>
                    <td><?= $R['NIS']; ?> </td>
                    <td><?= $R['Nama_Siswa']; ?> </td>
                    <td><?= $R['Matapelajaran_ID']; ?> </td>
                    <td><?= $R['Nilai_Tugas_1']; ?> </td>
                    <td><?= $R['Nilai_Tugas_2']; ?> </td>
                    <td><?= $R['Nilai_Tugas_3']; ?> </td>
                    <td><?= $R['Nilai_UTS']; ?> </td>
                    <td><?= $R['Nilai_UAS']; ?> </td>
                    <td>
                      <a href="<?= base_url('Teacher/EditInputRaportSiswa/') . $R['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Teacher/HapusInputRaportSiswa/') . $R['ID']; ?>" class="badge badge-danger">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
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

<!-- Modal -->
<div class="modal fade" id="NewScoreModal" tabindex="-1" role="dialog" aria-labelledby="NewScoreModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewScoreModalLabel">Add Raport Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Teacher/InputRaportSiswa'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>ID Raport</label>
              <input type="text" class="form-control" name="idraport">
            </div>
            <div class="form-group col-md-6">
              <label>Student Name</label>
              <select name="namasiswa" class="form-control">
                <option value="">Select Student</option>
                <?php foreach ($Siswa as $S) : ?>
                  <option value="<?= $S['Nama_Siswa']; ?>"><?= $S['Nama_Siswa']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Class Name</label>
              <select name="kelas_id" class="form-control">
                <option value="">Select Class</option>
                <?php foreach ($Kelas as $K) : ?>
                  <option value="<?= $K['Kode_Kelas']; ?>"><?= $K['Kode_Kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIS</label>
              <select name="nis" class="form-control">
                <option value="">Select NIS</option>
                <?php foreach ($Siswa as $S) : ?>
                  <option value="<?= $S['NIS']; ?>"><?= $S['NIS']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-8">
              <label>Academic Subject Name</label>
              <select name="matapelajaran_id" class="form-control">
                <option value="">Select Subject</option>
                <?php foreach ($MataPelajaran as $MP) : ?>
                  <option value="<?= $MP['Nama_Mapel']; ?>"><?= $MP['Nama_Mapel']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Semester</label>
              <select name="semester" class="form-control">
                <option value="">Select Semester</option>
                <?php foreach ($Semester as $S) : ?>
                  <option value="<?= $S; ?>"><?= $S; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Academic Year</label>
              <select name="tahun_akademik" class="form-control">
                <option value="">Select Academic Years</option>
                <?php foreach ($TahunAkademik as $TA) : ?>
                  <option value="<?= $TA; ?>"><?= $TA; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <hr>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Task Score 1</label>
              <input type="number" class="form-control" name="nilaitugas1">
            </div>
            <div class="form-group col-md-4">
              <label>Task Score 2</label>
              <input type="number" class="form-control" name="nilaitugas2">
            </div>
            <div class="form-group col-md-4">
              <label>Task Score 3</label>
              <input type="number" class="form-control" name="nilaitugas3">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Mid-Semester Score</label>
              <input type="number" class="form-control" name="nilaiuts">
            </div>
            <div class="form-group col-md-6">
              <label>End-Semester Score</label>
              <input type="number" class="form-control" name="nilaiuas">
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="au-btn au-btn-load" data-dismiss="modal">Close</button>
          <button type="submit" class="au-btn au-btn--blue">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>