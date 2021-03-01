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
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewASModal"><i class="zmdi zmdi-plus"></i>Add New Academic Subject</a>
            </div>
          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Academic Subject Code</th>
                  <th>Academic Subject Name</th>
                  <th>JP</th>
                  <th>Teacher</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($MataPelajaran as $MP) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $MP['Kode_Mapel']; ?> </td>
                    <td><?= $MP['Nama_Mapel']; ?> </td>
                    <td><?= $MP['JP']; ?> </td>
                    <td><?= $MP['Nama_Guru']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/DetailMataPelajaran/') . $MP['ID']; ?>" class="badge badge-primary">Detail</a>
                      <a href="<?= base_url('Admin/EditMataPelajaran/') . $MP['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Admin/HapusMataPelajaran/') . $MP['ID']; ?>" class="badge badge-danger">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Academic Subject Info</h5>
            </div>
            <div class="card-body">
              Tunas Jakasampurna High School has a policy on Lesson Hours (JP) which are :

              <strong> 1 JP = 45 minutes</strong>
            </div>
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
<div class="modal fade" id="NewASModal" tabindex="-1" role="dialog" aria-labelledby="NewASModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewASModalLabel">Add New Academic Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/MataPelajaran'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control" name="kodematapelajaran" placeholder="Academic Subject Code">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="namamatapelajaran" placeholder="Academic Subject Name">
          </div>

          <div class="form-group">
            <select name="sks" class="form-control">
              <option value="">Select JP</option>
              <?php foreach ($SKS as $S) : ?>
                <option value="<?= $S; ?>"><?= $S; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- COMBOBOX FORM -->
          <div class="form-group">
            <select name="guru_id" class="form-control">
              <option value="">Select Teacher</option>
              <?php foreach ($Guru as $G) : ?>
                <option value="<?= $G['ID']; ?>"><?= $G['Nama_Guru']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- END COMBOBOX FORM -->
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