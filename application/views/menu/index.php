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
                    <!-- TAMPILAN SUKSES -->
                    <?= $this->session->flashdata('message');  ?>
                    <!-- END TAMPILAN SUKSES -->

                    <!-- USER DATA-->
                    <a href="#" class="au-btn au-btn-icon au-btn--blue mb-3" data-toggle="modal" data-target="#NewMenuModal"><i class="zmdi zmdi-plus"></i>Add New Menu</a>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($Menu as $M) : ?>
                                    <tr>
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td><?= $M['Menu']; ?> </td>
                                        <td>
                                            <a href="<?= base_url('Menu/EditMenu/') . $M['ID']; ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('Menu/HapusMenu/') . $M['ID']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="NewMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?= base_url('Menu'); ?>" method="post">
                <div class="modal-body">
                    <!-- FORM TAMBAH MENU-->
                    <div class="form-group">
                        <input type="text" class="form-control" name="menu" placeholder="Menu name">
                    </div>
                    <!-- END FORM TAMBAH MENU -->
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