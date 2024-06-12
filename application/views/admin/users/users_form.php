<div class="container-fluid pt-3 px-4 ">
    <div class="row mb-2">
        <div class="col-12 mb-2">
            <h2 style="margin-top:0px">User Update</h2>
        </div>
        <div class="col-md-12 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
    </div>
    <div class="row py-4">
        <div class="col-md-12">
            <div class="card p-2 border-primary bg-light">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="col-lg-12">
                                <div class="mb-4 text-center">
                                    <?php if ($foto == null) { ?>
                                        <img id="blah" src="<?= base_url('assets/admin/img/user.png') ?>"
                                            class="items-center my-auto img-thumbnail" alt="..." width="120" height="120">
                                    <?php } else { ?>

                                        <img id="blah" src="<?= base_url('assets/user/foto/' . $foto) ?>"
                                            class="items-center my-auto img-thumbnail" alt="..." width="120" height="120">
                                    <?php } ?>


                                    <label for="imgInp" id="fchange"><i class="fa fa-camera"></i></label>
                                    <input type="file" name="file" id="imgInp" class="d-none" accept="image/*">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Masukkan nama lengkap" value="<?= $nama ?>">
                                                        <!-- <small class="text-danger">
                                                            <?php echo form_error('nama') ?>
                                                        </small> -->
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control form-control-sm" id="tgl_lahir" placeholder="" value="<?= $tgl_lahir ?>">
                                                    </div>
                                                    <div class="">
                                                        <label for="nama" class="form-label">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="mb-3 form-check-inline">
                                                        <input type="radio" value="1" name="jenis_kelamin" class="form-check-input" id="jk1" <?php if ($jenis_kelamin == 1) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                                        <label class="form-check-label text-dark" for="jk1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 form-check-inline">
                                                        <input type="radio" value="2" name="jenis_kelamin" class="form-check-input" id="jk-2" <?php if ($jenis_kelamin == 2) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                                        <label class="form-check-label text-dark" for="jk-2">Perempuan</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hobi" class="form-label">Hobi</label>
                                                        <input type="text" name="hobi" class="form-control form-control-sm" id="hobi" placeholder="Hobi" value="<?= $hobi ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                        <input type="text" name="pekerjaan" class="form-control form-control-sm" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsikan diri anda" class="form-label">Deskripsikan diri anda</label>
                                                        <textarea name="deskripsi_diri" id="" class="form-control" placeholder="Tuliskan tentang diri anda" rows="4"><?= $deskripsi_diri ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kriteria" class="form-label">Kriteria pasangan</label>
                                                        <textarea name="kriteria_pasangan" id="" class="form-control" placeholder="Tuliskan kriteria pasangan anda" rows="4"><?= $kriteria_pasangan ?></textarea>
                                                    </div>
                                                    <!-- <div class="input-group mb-3">
                                                        <span class="input-group-text" id="email">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                                                    </div> -->
                                                   
                                                </div>
                                                <div class="col-lg-6">
                                                <?php if($alamat!=null){?>
                                                        <div class="alamat">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Alamat Saat Ini</label>
                                                                <textarea name="alamat" class="form-control" readonly id="" rows="4"><?=$alamat?></textarea>
                                                            </div>
                                                           
                                                        </div>
                                                    
                                                    <?php
                                                    }else{
                                                       
                                                    }
                                                    ?>
                                                    <div class="mb-3">
                                                        <label class="form-label">Provinsi <small></small></label>
                                                        <select name="" class="form-control select-search provinsi" id="provinsi">
                                                            <option>Provinsi</option>
                                                            <?php 
                                                                foreach($provinsi as $prov)
                                                                {
                                                                    echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        
                                                    </div>       
                                                    <div class="mb-3">
                                                    <label class="form-label">Kabupaten <small></small></label>
                                                        <select name="" class="form-control select-search kabupaten" id="kabupaten">
                                                            <option value=''>Kabupaten</option>
                                                        </select>
                                                    </div>                                             
                                                    <div class="mb-3">
                                                    <label class="form-label">Kecamatan <small></small></label>
                                                        <select name="" class="form-control select-search kecamatan" id="kecamatan">
                                                            <option>Kecamatan</option>
                                                        </select>
                                                    </div>                                             
                                                    <div class="mb-3">
                                                        <label class="form-label">Desa <small></small></label>
                                                        <select name="s" class="form-control select-search desa" id="desa">
                                                            <option>Desa</option>
                                                        </select>
                                                    </div>                                             
                                                    <div class="mb-4">
                                                        <label class="form-label">Nama jalan,Rt/Rw <small></small></label>
                                                        <input type="text" name="rt_rw" id="rt_rw" class="form-control" placeholder="Nama jalan atau Rt/Rw">
                                                    </div>      
                                                    <div class="mb-2">
                                                        <label class="form-label">Kontak</label>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="phone">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <input type="phone" name="phone" class="form-control" placeholder="phone" aria-label="phone" aria-describedby="phone" value="<?= $phone ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="fb">
                                                            <i class="fa-brands fa-facebook"></i>
                                                        </span>
                                                        <input type="fb" name="fb" class="form-control" placeholder="fb" aria-label="fb" aria-describedby="fb" value="<?= $fb ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="ig">
                                                            <i class="fa-brands fa-instagram"></i>
                                                        </span>
                                                        <input type="ig" name="ig" class="form-control" placeholder="ig" aria-label="ig" aria-describedby="ig" value="<?= $ig ?>">
                                                    </div> 
                                                    <div class="py-4">
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn bg-1 text-white">Update</button>
                                                        </div>
                                                    </div>
                                                </div>



                            <div class="form-group">
                                <label for="varchar">Ip Address <?php echo form_error('ip_address') ?></label>
                                <input type="text" class="form-control" name="ip_address" id="ip_address"
                                    placeholder="Ip Address" value="<?php echo $ip_address; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Username <?php echo form_error('username') ?></label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Username" value="<?php echo $username; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Password <?php echo form_error('password') ?></label>
                                <input type="text" class="form-control" name="password" id="password"
                                    placeholder="Password" value="<?php echo $password; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Email <?php echo form_error('email') ?></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                    value="<?php echo $email; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Activation Selector
                                    <?php echo form_error('activation_selector') ?></label>
                                <input type="text" class="form-control" name="activation_selector"
                                    id="activation_selector" placeholder="Activation Selector"
                                    value="<?php echo $activation_selector; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Activation Code <?php echo form_error('activation_code') ?></label>
                                <input type="text" class="form-control" name="activation_code" id="activation_code"
                                    placeholder="Activation Code" value="<?php echo $activation_code; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Forgotten Password Selector
                                    <?php echo form_error('forgotten_password_selector') ?></label>
                                <input type="text" class="form-control" name="forgotten_password_selector"
                                    id="forgotten_password_selector" placeholder="Forgotten Password Selector"
                                    value="<?php echo $forgotten_password_selector; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Forgotten Password Code
                                    <?php echo form_error('forgotten_password_code') ?></label>
                                <input type="text" class="form-control" name="forgotten_password_code"
                                    id="forgotten_password_code" placeholder="Forgotten Password Code"
                                    value="<?php echo $forgotten_password_code; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">Forgotten Password Time
                                    <?php echo form_error('forgotten_password_time') ?></label>
                                <input type="text" class="form-control" name="forgotten_password_time"
                                    id="forgotten_password_time" placeholder="Forgotten Password Time"
                                    value="<?php echo $forgotten_password_time; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Remember Selector
                                    <?php echo form_error('remember_selector') ?></label>
                                <input type="text" class="form-control" name="remember_selector" id="remember_selector"
                                    placeholder="Remember Selector" value="<?php echo $remember_selector; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Remember Code <?php echo form_error('remember_code') ?></label>
                                <input type="text" class="form-control" name="remember_code" id="remember_code"
                                    placeholder="Remember Code" value="<?php echo $remember_code; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">Created On <?php echo form_error('created_on') ?></label>
                                <input type="text" class="form-control" name="created_on" id="created_on"
                                    placeholder="Created On" value="<?php echo $created_on; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">Last Login <?php echo form_error('last_login') ?></label>
                                <input type="text" class="form-control" name="last_login" id="last_login"
                                    placeholder="Last Login" value="<?php echo $last_login; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tinyint">Active <?php echo form_error('active') ?></label>
                                <input type="text" class="form-control" name="active" id="active" placeholder="Active"
                                    value="<?php echo $active; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    placeholder="First Name" value="<?php echo $first_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    placeholder="Last Name" value="<?php echo $last_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Company <?php echo form_error('company') ?></label>
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Company" value="<?php echo $company; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Phone <?php echo form_error('phone') ?></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"
                                    value="<?php echo $phone; ?>" />
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('users_admin') ?>" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>