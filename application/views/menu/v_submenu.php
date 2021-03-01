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
          <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewSubMenuModal"><i class="zmdi zmdi-plus"></i>Add New Sub Menu</a>
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Menu</th>
                  <th>Url</th>
                  <th>Icon</th>
                  <th>Active</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($SubMenu as $SM) : ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $SM['Title']; ?> </td>
                    <td><?= $SM['Menu']; ?> </td>
                    <td><?= $SM['Url']; ?> </td>
                    <td><?= $SM['Icon']; ?> </td>
                    <td><?= $SM['Aktifasi']; ?> </td>
                    <td>
                      <a href="<?= base_url('Menu/EditSubmenu/') . $SM['ID']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('Menu/HapusSubmenu/') . $SM['ID']; ?>" class="badge badge-danger">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-load">Sub Menu Information</h5>
            </div>
            <div class="card-body">
              Sub Menu Management is a Menu contained in the sidebar, you can create a new Sub Menu by adding a <strong>URL</strong> or an <strong>Icon</strong>. See all icons so you can make the icons you want ...
              <div class="row mt-4">
                <div class="col-md-3">
                  <a href="<?= base_url('Menu/ListIcon') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-arrow-forward"></i> See Icon!</a>
                </div>
              </div>
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
<div class="modal fade" id="NewSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewSubMenuModalLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/Submenu'); ?>" method="post">
        <div class="modal-body">
          <!-- FORM TAMBAH MENU-->
          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Sub menu title">
          </div>
          <!-- END FORM TAMBAH MENU -->
          <!-- COMBOBOX FORM -->
          <div class="form-group">
            <select name="menu_id" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($Menu as $M) : ?>
                <option value="<?= $M['ID']; ?>"><?= $M['Menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- END COMBOBOX FORM -->
          <div class="form-group">
            <input type="text" class="form-control" name="url" placeholder="Sub menu url">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="icon" placeholder="Sub menu icon">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="aktifasi" checked>
              <label class="form-check-label" for="aktifasi">
                Active ?
              </label>
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