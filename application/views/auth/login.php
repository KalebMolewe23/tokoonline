<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url(); ?>assets/login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In</h3>
                            <?= $this->session->flashdata('message') ?>
                            <p class="mb-4">Welcome to dalbo online. The best place for second hand clothes transactions.</p>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">

                            <span class="d-block text-left my-4 text-muted">&mdash; Don't Have Account?<a href="<?= base_url(); ?>auth/register"> Click Here!!!</a> &mdash;</span>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/login/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>assets/login/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/login/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/login/js/main.js"></script>