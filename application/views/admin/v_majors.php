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

          <!-- TIDAK ADA DATA YANG DICARI -->
          <?php if (empty($Jurusan)) : ?>
            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
              <i class="zmdi zmdi-close-circle danger"></i>
              <span class="content-danger">Major not found!</span>
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle"></i>
                </span>
              </button>
            </div>
          <?php endif; ?>
          <!-- END TIDAK ADA DATA YANG DICARI -->

          <!-- TAMPILAN SUKSES -->
          <?= $this->session->flashdata('message');  ?>
          <!-- END TAMPILAN SUKSES -->

          <!-- USER DATA-->
          <div class="row">

            <div class="col-sm-4">
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewMajorsModal"><i class="zmdi zmdi-plus"></i>Add New Majors</a>
            </div>
            <div class="col-sm-8">
              <form class="form-header" action="" method="post" enctype="multipart/form-data">
                <input class="au-input au-input--full" type="text" name="carijurusan" placeholder="Search datas for . . ." />
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
                  <th>Majors Code</th>
                  <th>Majors Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Jurusan as $J) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $J['Kode_Jurusan']; ?> </td>
                    <td><?= $J['Nama_Jurusan']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/EditJurusan/') . $J['ID'] ?>" class="badge badge-success">Edit</a>
                      <a href=" <?= base_url('Admin/HapusJurusan/') . $J['ID'] ?>" class="badge badge-danger">Delete</a>
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

<!-- Modal Input-->
<div class="modal fade" id="NewMajorsModal" tabindex="-1" role="dialog" aria-labelledby="NewMajorsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewMajorsModalLabel">Add New Majors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/Jurusan'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- FORM TAMBAH JURUSAN-->
          <div class="form-group">
            <input type="text" class="form-control" name="kodejurusan" placeholder="Majors Code">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="namajurusan" placeholder="Majors Name">
          </div>
          <!-- END FORM TAMBAH JURUSAN-->
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