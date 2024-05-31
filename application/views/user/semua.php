<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>

    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <h5></h5>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <form action="<?= base_url('users_user/semua') ?>" method="post">
                                    <div class="mb-3">
                                        <input type="text" name="cari" class="form-control" placeholder="Cari.."
                                            onchange="this.form.submit();" value="<?= $cari ?>">
                                    </div>
                                </form>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php foreach ($users as $u) { ?>
                                <div class="col-4 pt-3">
                                    <a href="<?= base_url('users_user/detail/' . $u->id_user) ?>"
                                        class="text-decoration-none text-dark">
                                        <div class="card card-all">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <?php if ($u->foto == null) { ?>
                                                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                                class="rounded-circle" width="60" height="60">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url('assets/user/foto/' . $u->foto) ?>" alt=""
                                                                class="rounded-circle" width="60" height="60">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-9">
                                                        <h6>
                                                            <?= $u->nama ?>
                                                        </h6>
                                                        <p style="font-size: 12px;">
                                                            <?= substr($u->deskripsi_diri, 0, 50) . '..';
                                                            // <?=$u->deskripsi_diri ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <small>&copy Matchmaking by <a href="#">Dieng Cyber</a></small>
                    <small>Made with ❤</small>
                    <div class="col"> </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- Mobile -->
<div class="d-lg-none">
    <div class="container">
        <section class="fixed-top ">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between py-3 bg-white">
                        <a href="<?= base_url('profile_user') ?>" class="text-decoration-none">
                            <div class="">
                                <?php if ($this->session->userdata('foto') == null) { ?>
                                    <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="hugenerd" width="40"
                                        height="40" class="rounded-3">
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>"
                                        alt="hugenerd" width="40" height="40" class="rounded-3">

                                <?php } ?>

                                <span style="color:rgb(78, 78, 78)">
                                    <?= $this->session->userdata('nama') ?>
                                </span>
                                <br>
                            </div>

                        </a>
                        <div class="pt-2">
                            <i class="fa-solid fa-mars-and-venus-burst fa-xl color-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Nav -->

        <!-- Content -->

        <section id="content" style="margin-bottom: 80px;margin-top: 80px;">
            <div class="container pt-2">
                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('users_user/semua') ?>" method="post">
                            <div class="mb-3">
                                <input type="text" name="cari" class="form-control form-control-sm" placeholder="Cari.."
                                    onchange="this.form.submit();" value="<?= $cari ?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-4">
                    <?php foreach ($users as $u) { ?>
                        <div class="col-12 mb-3">
                            <a href="<?= base_url('users_user/detail/' . $u->id_user) ?>"
                                class="text-decoration-none text-dark">
                                <div class="row">
                                    <div class="col-3">
                                        <?php if ($u->foto == null) { ?>
                                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                class="rounded-circle" width="50" height="50">
                                        <?php } else { ?>
                                            <img src="<?= base_url('assets/user/foto/' . $u->foto) ?>" alt="" class="rounded-circle"
                                                width="50" height="50">
                                        <?php } ?>
                                    </div>
                                    <div class="col-9">
                                        <h6>
                                            <?= $u->nama ?>
                                        </h6>
                                        <p style="font-size: 10px;">
                                            <?= substr($u->deskripsi_diri, 0, 50) . '..';
                                            // <?=$u->deskripsi_diri ?>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </section>
    </div>
</div>