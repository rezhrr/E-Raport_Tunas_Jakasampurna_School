<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="<?= base_url('Auth') ?>">
                            <img src="<?= base_url(); ?>assets/foto_tjs/icon/logo-eraport.png" width="70%">
                        </a>
                    </div>



                    <?= $this->session->flashdata('message'); ?>

                    <div class="login-form">
                        <form action="<?= base_url('Auth'); ?>" method="post">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Enter Email Address" value="<?= set_value('email'); ?>" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Login</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Forgotten password?
                                <a href="<?= base_url('Auth/ForgotPassword') ?>">Reset Your Password</a>
                            </p>
                        </div>
                        <div class="register-link">
                            <p>
                                Don't have an account?
                                <a href="<?= base_url('Auth/Registration') ?>">Registration Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>