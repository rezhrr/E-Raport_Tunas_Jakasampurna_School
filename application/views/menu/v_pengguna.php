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
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($Pengguna as $P) : ?>
                                    <tr>
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td><?= $P['Nama']; ?> </td>
                                        <td><?= $P['Email']; ?> </td>
                                        <td><?= $P['HakAkses']; ?> </td>
                                        <td>
                                            <a href="<?= base_url('Menu/EditPengguna/') . $P['ID']; ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('Menu/HapusPengguna/') . $P['ID']; ?>" class="badge badge-danger">Delete</a>
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

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>