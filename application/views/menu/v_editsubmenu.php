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
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?= base_url('Menu/Submenu') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-undo"></i> Back</a>
                        </div>
                    </div>

                    <form action="<?= base_url('Menu/EditSubmenu/') . $SubMenuu['ID']; ?>" method="post" enctype="multipart/form-data">
                        <!-- HARUS ADA ID JIKA INGIN EDIT/UPDATE -->
                        <input type="hidden" name="ID" value="<?= $SubMenuu['ID']; ?>">
                        <div class=" form-group row">
                            <label class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="<?= $SubMenuu['Title']; ?>" readonly>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-sm-3 col-form-label">Menu</label>
                            <div class="col-sm-9">
                                <select name="menu_id" class="form-control">
                                    <?php foreach ($Menu as $M) : ?>
                                        <?php if ($M['ID'] == $SubMenuu['Menu_ID']) : ?>
                                            <option value="<?= $M['ID']; ?>" selected><?= $M['Menu']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $M['ID']; ?>"><?= $M['Menu']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-sm-3 col-form-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url" value="<?= $SubMenuu['Url']; ?>" readonly>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-sm-3 col-form-label">Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon" value="<?= $SubMenuu['Icon']; ?>">
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