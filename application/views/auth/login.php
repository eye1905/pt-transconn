<div class="wrapper">
    <section class="login-content">
        <img src="<?= base_url() ?>assets/lsjimage/02.png" class="lb-img" alt="">
        <img src="<?= base_url() ?>assets/lsjimage/03.png" class="rb-img" alt="">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                            <img src="<?= base_url() ?>assets/lsjimage/logo.png" class="img-fluid w-75" alt="">
                        </div>
                        <div class="col-lg-6 mb-5">
                            <?= $this->session->flashdata('message'); ?>
                            <h2 class="mb-2">Login</h2>
                            <p class=" font-weight-bold">Lintas Samudra Jaya Booking Sistem</p>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= form_error('username', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" name="username" type="text" placeholder=" ">
                                            <label>Username</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= form_error('password', '<medium class="text-danger pl-1 text-left">', '</medium>') ?>
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" name="password" type="password" placeholder=" ">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary px-xl-5">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>