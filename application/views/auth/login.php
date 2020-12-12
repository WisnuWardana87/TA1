    <div class="login-box">
        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="<?= base_url(); ?>/media/images/Undiksha.png" width="200px" height="200px" style="display: block; margin: auto;">
                <div class="mb-3"></div>
                <div class="login-box-msg">
                    <a><strong>
                            <h3>SIPRESMA</h3>
                        </strong></a>
                    <p>SISTEM INFORMASI PRESTASI MAHASISWA</p>
                </div>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('email'); ?></small>


                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('password'); ?></small>

                    <div class="row mb-3">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In <i class="fas fa-sign-in-alt"></i></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->