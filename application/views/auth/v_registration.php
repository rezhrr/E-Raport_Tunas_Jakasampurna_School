<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="<?= base_url('Auth/Registration') ?>">
                            <img src="<?= base_url() ?>assets/foto_tjs/icon/logo-eraport.png" width="70%" />
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="<?= base_url('Auth/Registration') ?>" method="post">
                            <div class="form-group">
                                <label>Full name</label>
                                <input class="au-input au-input--full" type="text" name="fullname" placeholder="Full name" value="<?= set_value('name'); ?>" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" />
                                <!-- COMENT ERROR JIKA DATA KOSONG -->
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password1" placeholder="Password" />
                                    <!-- COMENT ERROR JIKA DATA KOSONG -->
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label>Repeat Password</label>
                                    <input class="au-input au-input--full" type="password" name="password2" placeholder="Repeat Password" />
                                </div>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">
                                Register
                            </button>
                        </form>
                        <div class="register-link">
                            <p>
                                Forgotten password?
                                <a href="<?= base_url('Auth/ForgotPassword') ?>">Reset Your Password</a>
                            </p>
                        </div>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="<?= base_url('Auth'); ?>">Login Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>