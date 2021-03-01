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
                <div class="col-lg-6">
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
                    <form action="<?= base_url('Admin/EditKelas/') . $Kelass['ID']; ?>" method="post" enctype="multipart/form-data">
                        <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
                        <input type="hidden" name="ID" value="<?= $Kelass['ID']; ?>">
                        <div class=" form-group row">
                            <label class="col-sm-4 col-form-label">Class Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kodekelas" value="<?= $Kelass['Kode_Kelas']; ?>">
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-sm-4 col-form-label">Class Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="namakelas" value="<?= $Kelass['Nama_Kelas']; ?>">
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-sm-4 col-form-label">Class Vice Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="namawalas" value="<?= $Kelass['Nama_Walas']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select Majors</label>
                            <div class="col-lg-8">
                                <select name="jurusan_id" class="form-control">
                                    <?php foreach ($Jurusan as $J) : ?>
                                        <?php if ($J['ID'] == $Kelass['Jurusan_ID']) : ?>
                                            <option value="<?= $J['ID']; ?>" selected><?= $J['Kode_Jurusan']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $J['ID']; ?>"><?= $J['Kode_Jurusan']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-lg-8">
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