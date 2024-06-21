<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2>Profile</h2>
        </div>
    </div>
    <div class="row bg-light pt-4 py-4">
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>

        <form action="<?= base_url('profile_admin/update') ?>" method="post" enctype="multipart/form-data">
            <div class="fail" id="fail"
                fail="<?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>">
            </div>
            <div class="success" id="success"
                success="<?php echo $this->session->userdata('success') <> '' ? $this->session->userdata('success') : ''; ?>">
            </div>

            <div class="col-lg-12">
                <div class="card card-all">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4 text-center">

                                    <img id="blah" src="<?= base_url('assets/admin/img/user.png') ?>"
                                        class="items-center my-auto img-thumbnail" alt="..." width="120" height="120">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control form-control-sm"
                                        id="username" placeholder="Username" value="<?= $username ?>">
                                    <!-- <small class="text-danger">
                                            <?php echo form_error('username') ?>
                                        </small> -->
                                </div>
                            </div>
                           
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" readonly disabled
                                        placeholder="Email" value="<?= $email ?>">
                                    <!-- <small class="text-danger">
                                            <?php echo form_error('email') ?>
                                        </small> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Nama Depan</label>
                                    <input type="text" name="first_name" class="form-control form-control-sm"
                                        id="first_name" placeholder="Masukkan Nama Depan" value="<?= $first_name ?>">
                                    <!-- <small class="text-danger">
                                            <?php echo form_error('first_name') ?>
                                        </small> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Nama Belakang</label>
                                    <input type="text" name="last_name" class="form-control form-control-sm"
                                        id="last_name" placeholder="Masukkan Nama Belakang" value="<?= $last_name ?>">
                                    <!-- <small class="text-danger">
                                            <?php echo form_error('last_name') ?>
                                        </small> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="phone" class="form-label">No Telp/Hp</label>
                                    <input type="text" name="phone" class="form-control form-control-sm" id="phone"
                                        placeholder="No telp" value="<?= $phone ?>">
                                    <!-- <small class="text-danger">
                                            <?php echo form_error('phone') ?>
                                        </small> -->
                                </div>
                            </div>
                            
                            <!-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control form-control-sm"
                                        id="password" placeholder="Password">
                                    <small class="text-danger">
                                            <?php echo form_error('password') ?>
                                        </small>
                                </div>
                            </div> -->
                            <div class="col-lg-6 pt-2">
                                <div class="py-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>