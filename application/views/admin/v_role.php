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
          <!-- TIDAK ADA DATA YANG DICARI -->
          <?php if (empty($HakAkses)) : ?>
            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
              <i class="zmdi zmdi-close-circle danger"></i>
              <span class="content-danger">Role not found!</span>
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle"></i>
                </span>
              </button>
            </div>
          <?php endif; ?>
          <!-- TAMPILAN SUKSES -->
          <?= $this->session->flashdata('message');  ?>
          <!-- END TAMPILAN SUKSES -->

          <!-- USER DATA-->
          <div class="row">

            <div class="col">
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewRoleModal"><i class="zmdi zmdi-plus"></i>Add New Role</a>
            </div>
            <div class="col-sm-7">
              <form class="form-header" action="" method="post" enctype="multipart/form-data">
                <input class="au-input au-input--full" type="text" name="carihakakses" placeholder="Search datas for . . ." />
                <button class="au-btn--submit" type="submit">
                  <i class="zmdi zmdi-search"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($HakAkses as $H) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $H['HakAkses']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/HakAksesAkses/') . $H['ID'] ?>" class="badge badge-info">Access</a>
                      <a href="<?= base_url('Admin/EditHakAkses/') . $H['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Admin/HapusHakAkses/') . $H['ID'] ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewRoleModal" tabindex="-1" role="dialog" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewRoleModalLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/HakAkses'); ?>" method="post">
        <div class="modal-body">
          <!-- FORM TAMBAH MENU-->
          <div class="form-group">
            <input type="text" class="form-control" name="hakakses" placeholder="Role name">
          </div>
          <!-- END FORM TAMBAH MENU -->
        </div>
        <div class="modal-footer">
          <button type="button" class="au-btn au-btn-load" data-dismiss="modal">Close</button>
          <button type="submit" class="au-btn au-btn-icon au-btn--blue">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>


<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>