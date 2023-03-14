<section class="login-content">
    <div class="container">
        <div class="row align-items-center justify-content-center px-lg-5 pt-5">
            <div class="col-sm-12 col-lg-10 text-center pb-lg-5">
                <img src="<?= base_url() ?>assets/lsjimage/logo.png" height="80px" alt="Pic">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 text-center">
                <?= $this->session->flashdata('message'); ?>
                <h2 class="mb-2">Login</h2>
                <p class="font-weight-bold"><?= $this->config->item('nama_perush'); ?> Booking Sistem</p>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                            <?= form_error('username', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
                            <div class="floating-label form-group">

                                <input class="floating-input form-control form-control-lg" name="username" placeholder=" ">
                                <label>Username</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                            <?= form_error('password', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
                            <div class="floating-label form-group">
                                <input class="floating-input form-control form-control-lg" name="password" type="password" placeholder=" ">
                                <label>Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="container px-0">
                        <button type="submit" class="btn btn-primary w-100 pt-2 pb-2">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>