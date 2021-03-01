<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="<?= base_url('Auth/ForgotPassword') ?>">
                            <img src="<?= base_url(); ?>assets/foto_tjs/icon/logo-eraport.png" width="70%">
                        </a>
                    </div>


                    <?= $this->session->flashdata('message'); ?>

                    <div class="login-form">
                        <form action="<?= base_url('Auth/ForgotPassword'); ?>" method="post">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Enter Email Address" value="<?= set_value('email'); ?>" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Reset Password</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="<?= base_url('Auth'); ?>">Back to Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>