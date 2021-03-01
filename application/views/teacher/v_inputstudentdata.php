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
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewInputStudentModal"><i class="zmdi zmdi-plus"></i>Add New Input Student</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Siswa as $S) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $S['NIS']; ?> </td>
                    <td><?= $S['Nama_Siswa']; ?> </td>
                    <td><?= $S['Email']; ?> </td>
                    <td>
                      <a href="<?= base_url('Teacher/DetailInputDataSiswa/') . $S['ID']; ?>" class="badge badge-primary">Detail</a>
                      <a href="<?= base_url('Teacher/EditInputDataSiswa/') . $S['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Teacher/HapusInputDataSiswa/') . $S['ID']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewInputStudentModal" tabindex="-1" role="dialog" aria-labelledby="NewInputStudentModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewInputStudentModall">Add New Input Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Teacher/InputDataSiswa'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIS</label>
              <input type="text" class="form-control" name="nis">
            </div>
            <div class="form-group col-md-8">
              <label>Student Name</label>
              <input type="text" class="form-control" name="namasiswa">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Gender</label>
              <select name="jeniskelamin" class="form-control">
                <option value="">Select Gender</option>
                <?php foreach ($JenisKelamin as $JK) : ?>
                  <option value="<?= $JK; ?>"><?= $JK; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Place of Birth</label>
              <input type="text" class="form-control" name="tempatlahir">
            </div>
            <div class="form-group col-md-4">
              <label>Date of Birth</label>
              <input type="date" class="form-control" name="tanggallahir">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Religion</label>
              <select name="agama" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <option value="<?= $A; ?>"><?= $A; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group col-md-4">
              <label>Telepon</label>
              <input type="text" class="form-control" name="telepon">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Address</label>
              <input type="text" class="form-control" name="alamat">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-4">
                  <img src="<?= base_url('assets/foto_tjs/student/student.png'); ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-8">
                  <label>Parents Name</label>
                  <select name="orangtua_id" class="form-control">
                    <option value="">Select Parents</option>
                    <?php foreach ($OrangTua as $OT) : ?>
                      <option value="<?= $OT['ID']; ?>"><?= $OT['Nama_Bapak']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
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