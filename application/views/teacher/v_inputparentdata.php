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
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewInputParentModal"><i class="zmdi zmdi-plus"></i>Add New Input Parent</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Father Name</th>
                  <th>Fathers Profession</th>
                  <th>Mother Name</th>
                  <th>Mother Profession</th>
                  <th>Parents Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($OrangTua as $OT) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $OT['Nama_Bapak']; ?> </td>
                    <td><?= $OT['Pekerjaan_Bapak']; ?> </td>
                    <td><?= $OT['Nama_Ibu']; ?> </td>
                    <td><?= $OT['Pekerjaan_Ibu']; ?> </td>
                    <td><?= $OT['Alamat_Orangtua']; ?> </td>
                    <td>
                      <a href="<?= base_url('Teacher/DetailInputDataOrangTua/') . $OT['ID']; ?>" class="badge badge-primary">Detail</a>
                      <a href="<?= base_url('Teacher/EditInputDataOrangTua/') . $OT['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Teacher/HapusInputDataOrangTua/') . $OT['ID']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewInputParentModal" tabindex="-1" role="dialog" aria-labelledby="NewInputParentModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewInputParentModal">Add New Input Parent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Teacher/InputDataOrangTua'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

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
              <input type="text" class="form-control" name="nama_b">
            </div>
            <div class="form-group col-md-3">
              <label>Father Birthplace</label>
              <input type="text" class="form-control" name="tempatlahir_b">
            </div>
            <div class="form-group col-md-3">
              <label>Father Birthday</label>
              <input type="date" class="form-control" name="tanggallahir_b">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Father Religion</label>
              <select name="agama_b" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <option value="<?= $A; ?>"><?= $A; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Father Last Education</label>
              <select name="pendidikan_b" class="form-control">
                <option value="">Select Last Education</option>
                <?php foreach ($Pendidikan as $Pend) : ?>
                  <option value="<?= $Pend; ?>"><?= $Pend; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Father Profession</label>
              <select name="pekerjaan_b" class="form-control">
                <option value="">Select Profession</option>
                <?php foreach ($Pekerjaan as $Peker) : ?>
                  <option value="<?= $Peker; ?>"><?= $Peker; ?></option>
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
              <input type="text" class="form-control" name="nama_i">
            </div>
            <div class="form-group col-md-3">
              <label>Mother Birthplace</label>
              <input type="text" class="form-control" name="tempatlahir_i">
            </div>
            <div class="form-group col-md-3">
              <label>Mother Birthday</label>
              <input type="date" class="form-control" name="tanggallahir_i">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Mother Religion</label>
              <select name="agama_i" class="form-control">
                <option value="">Select Religion</option>
                <?php foreach ($Agama as $A) : ?>
                  <option value="<?= $A; ?>"><?= $A; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Mother Last Education</label>
              <select name="pendidikan_i" class="form-control">
                <option value="">Select Last Education</option>
                <?php foreach ($Pendidikan as $Pend) : ?>
                  <option value="<?= $Pend; ?>"><?= $Pend; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Mother Profession</label>
              <select name="pekerjaan_i" class="form-control">
                <option value="">Select Profession</option>
                <?php foreach ($Pekerjaan as $Peker) : ?>
                  <option value="<?= $Peker; ?>"><?= $Peker; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Parents Address</label>
              <input type="text" class="form-control" name="alamat_ortu">
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