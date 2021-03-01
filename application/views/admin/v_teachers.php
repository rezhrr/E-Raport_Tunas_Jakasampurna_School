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
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewTeachersModal"><i class="zmdi zmdi-plus"></i>Add New Teachers</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIG</th>
                  <th>Teacher Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Guru as $G) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $G['NIG']; ?> </td>
                    <td><?= $G['Nama_Guru']; ?> </td>
                    <td><?= $G['Email']; ?> </td>
                    <td><?= $G['Jenis_Kelamin']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/DetailGuru/') . $G['ID']; ?>" class="badge badge-primary">Detail</a>
                      <a href="<?= base_url('Admin/EditGuru/') . $G['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Admin/HapusGuru/') . $G['ID']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewTeachersModal" tabindex="-1" role="dialog" aria-labelledby="NewTeachersModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewTeachersModalLabel">Add New Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/Guru'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIG</label>
              <input type="text" class="form-control" name="nig">
            </div>
            <div class="form-group col-md-8">
              <label>Teacher Name</label>
              <input type="text" class="form-control" name="namaguru">
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
                  <img src="<?= base_url('assets/foto_tjs/teacher/teacher.png'); ?>" class="img-thumbnail">
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