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
                    <form action="<?= base_url('Admin/EditJurusan/') . $Jurusan['ID']; ?>" method="post" enctype="multipart/form-data">
                        <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
                        <input type="hidden" name="ID" value="<?= $Jurusan['ID']; ?>">
                        <div class=" form-group row">
                            <label class="col-sm-3 col-form-label">Majors Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kodejurusan" value="<?= $Jurusan['Kode_Jurusan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Majors Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="namajurusan" value="<?= $Jurusan['Nama_Jurusan']; ?>">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-lg-9">
                                <button type="submit" class="au-btn au-btn--blue">Edit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END ISI -->
        </div>
    </div>

</div>
<!-- END MAIN CONTENT-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>