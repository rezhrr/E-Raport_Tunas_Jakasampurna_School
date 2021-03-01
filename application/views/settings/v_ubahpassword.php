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

                    <!-- UNTUK MENAMPILKAN PESAN SALAH YANG DIBUAT DI CONTROLLER -->
                    <?= $this->session->flashdata('message'); ?>
                    <!-- PESAN SALAH -->

                    <form action="<?= base_url('Settings/UbahPassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="password_lama">Current Password</label>
                            <input type="password" class="form-control" name="passwordlama">
                            <!-- COMENT ERROR JIKA DATA KOSONG -->
                            <?= form_error('passwordlama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">New Password</label>
                            <input type="password" class="form-control" name="passwordbaru1">
                            <!-- COMENT ERROR JIKA DATA KOSONG -->
                            <?= form_error('passwordbaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2">Repeat Password</label>
                            <input type="password" class="form-control" name="passwordbaru2">
                            <!-- COMENT ERROR JIKA DATA KOSONG -->
                            <?= form_error('passwordbaru2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="au-btn au-btn--blue">Change Password</button>
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