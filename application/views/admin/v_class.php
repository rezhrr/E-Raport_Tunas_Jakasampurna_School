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
        <div class="col-lg-10">
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
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewClassModal"><i class="zmdi zmdi-plus"></i>Add New Class</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Class Code</th>
                  <th>Class Name</th>
                  <th>Class Vice Name</th>
                  <th>Majors</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Kelas as $K) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $K['Kode_Kelas']; ?> </td>
                    <td><?= $K['Nama_Kelas']; ?> </td>
                    <td><?= $K['Nama_Walas']; ?> </td>
                    <td><?= $K['Kode_Jurusan']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/EditKelas/') . $K['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Admin/HapusKelas/') . $K['ID']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewClassModal" tabindex="-1" role="dialog" aria-labelledby="NewClassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewClassModalLabel">Add New Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/Kelas'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control" name="kodekelas" placeholder="Class Code">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="namakelas" placeholder="Class Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="namawalas" placeholder="Class Vice Name">
          </div>

          <div class="form-group">
            <select name="jurusan_id" class="form-control">
              <option value="">Select Majors</option>
              <?php foreach ($Jurusan as $J) : ?>
                <option value="<?= $J['ID']; ?>"><?= $J['Kode_Jurusan']; ?></option>
              <?php endforeach; ?>
            </select>
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