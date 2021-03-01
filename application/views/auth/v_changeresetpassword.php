<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="<?= base_url('Auth/ChangeResetPassword') ?>">
                            <img src="<?= base_url(); ?>assets/foto_tjs/icon/logo-eraport.png" width="70%">
                        </a>
                    </div>

                    <div class="register-link mb-4">
                        <p class="title-5">Change your password for
                            <p class=""><?= $this->session->userdata('reset_email'); ?>
                            </p>
                        </p>
                    </div>



                    <?= $this->session->flashdata('message'); ?>

                    <div class="login-form">
                        <form action="<?= base_url('Auth/ChangeResetPassword'); ?>" method="post">
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="au-input au-input--full" type="password" name="password1" placeholder="Enter New Password" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="au-input au-input--full" type="password" name="password2" placeholder="Enter Repeat Password" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Reset Password</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>