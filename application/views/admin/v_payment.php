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
        <div class="col-lg-11">

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

            <div class="col-sm-5">
              <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewPaymentModal"><i class="zmdi zmdi-plus"></i>Add New Payment</a>
            </div>
            <!-- <div class="col-sm-8">
              <form class="form-header" action="" method="post" enctype="multipart/form-data">
                <input class="au-input au-input--full" type="text" name="carijurusan" placeholder="Search datas for . . ." />
                <button class="au-btn--submit" type="submit">
                  <i class="zmdi zmdi-search"></i>
                </button>
              </form>
            </div> -->

          </div>

          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Payment Code</th>
                  <th>Student Name</th>
                  <th>Payment Name</th>
                  <th>Payment Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Pembayaran as $Pemb) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $Pemb['Kode_Pembayaran']; ?> </td>
                    <td><?= $Pemb['Nama_Siswa']; ?> </td>
                    <td><?= $Pemb['Nama_Pembayaran']; ?> </td>
                    <td><?= $Pemb['Tanggal_Pembayaran']; ?> </td>
                    <td>
                      <a href="<?= base_url('Admin/DetailPembayaran/') . $Pemb['ID'] ?>" class="badge badge-primary">Detail</a>
                      <a href="<?= base_url('Admin/EditPembayaran/') . $Pemb['ID'] ?>" class="badge badge-success">Edit</a>
                      <a href=" <?= base_url('Admin/HapusPembayaran/') . $Pemb['ID'] ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewPaymentModal" tabindex="-1" role="dialog" aria-labelledby="NewPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewPaymentModalLabel">Add New Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Admin/Pembayaran'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control" name="kodepembayaran" placeholder="Payment Code">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="namasiswa" placeholder="Student Name">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email Student">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="namapembayaran" placeholder="Payment Name">
          </div>

          <div class="form-group">
            <select name="jenispembayaran" class="form-control">
              <option value="">Select Type of Payment</option>
              <?php foreach ($Jenis_Pembayaran as $JP) : ?>
                <option value="<?= $JP; ?>"><?= $JP; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <input type="number" class="form-control numberic" name="jumlahpembayaran" placeholder="Payment Amount">
          </div>
          <div class="form-group">
            <input type="date" class="form-control" name="tanggalpembayaran">
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