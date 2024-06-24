<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
        .color-1 {
            color: #7575fa;
        }

        .color-2 {
            color: #d600ff;
        }

        .bn45 {
            width: 170px;
            height: 50px;
        }

        .bn46 {
            width: 150px;
            height: 50px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;

        }

        .form-check-label {
            font-size: 12px;

        }

        small {
            font-size: 12px;
        }

        .pad-t {
            padding-top: 40%;
        }

        .pad-t-2 {
            padding-top: 7%;
            margin-bottom: 20px;
        }

        .card-login {
            border: 2px solid blue;
            border-radius: 10px;
        }

        label {
            color: #7575fa;
        }

        small {

            color: #7575fa;

        }

        .form-control:focus {
            border-color: #7575fa;
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .has-error .form-control:focus {
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .bg-1 {
            background-color: #7575fa
        }

        @media (max-width:991.98px) {
            .bn45 {
                width: 80px;
                height: 20px;
            }

            .bn46 {
                width: 90px;
                height: 20px;
            }

            .pad-t {
                padding-top: 10%;
            }

            .pad-t-2 {
                margin-bottom: 20px;
            }
        }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Profil</h5>
                            </div>
                        </div>
                        <div class="row">
                            <form action="<?= base_url('profile_user/update') ?>" method="post" enctype="multipart/form-data">
                            <div class="fail" id="fail" fail="<?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>"></div>
                            <div class="success" id="success" success="<?php echo $this->session->userdata('success') <> '' ? $this->session->userdata('success') : ''; ?>"></div>
                            <input type="hidden" name="prov" id="prov" value="<?=$prove?>">
                            <input type="hidden" name="kab" id="kab" value="<?=$kab?>">
                            <input type="hidden" name="kec" id="kec" value="<?=$kec?>">
                            <input type="hidden" name="des" id="des" value="<?=$des?>">
                                <div class="col-lg-12">
                                    <div class="card card-all">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="mb-4 text-center">
                                                    <?php if($foto==null){?>
                                                        <img id="blah" src="<?= base_url('assets/admin/img/user.png') ?>" class="i" alt="..." width="120px" height="120px">
                                                        <?php }else{ ?>
                                                           
                                                        <img id="blah" src="<?=base_url('assets/user/foto/'.$foto)?>" class="i" alt="..." width="120px" height="120px">
                                                            <?php } ?>

                                                        <br>
                                                        <label for="imgInp" id="" style="" class="btn bg-3 text-white mt-3">
                                                            Ubah
                                                        </label>
                                                        <input type="file" name="file" id="imgInp" class="d-none" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
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
                                                                <textarea name="alamat" class="form-control" readonly id="" rows="4"><?=$alamat?>, <?=$des?>, <?=$kec?>, <?=$kab?>, <?=$prove?></textarea>
                                                            </div>
                                                           
                                                        </div>
                                                    
                                                    <?php
                                                    }else{
                                                       
                                                    }
                                                    ?>
                                                    <div class="mb-4">
                                                        <label class="form-label">Alamat<small></small></label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?=$alamat?>">
                                                    </div> 
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
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                                        

<style>
        .scroll-container {
            width: 100%;
            /* Lebar kontainer */
            /* height: 300px; Tinggi kontainer */
            overflow-x: auto;
            /* Aktifkan scroll horizontal */
            overflow-y: none;
            /* Aktifkan scroll horizontal */
            white-space: nowrap;
            /* Pastikan konten tidak mematahkan baris */
            /* border: 1px solid #ccc; Garis tepi untuk kontainer */
            padding: 10px;
            /* Padding untuk kontainer */
        }

        .scroll-item {
            display: inline-block;
            /* Membuat item berada dalam satu baris */
            width: 80%;
            /* Lebar setiap item */
            margin-right: 10px;
            /* Jarak antar item */
            vertical-align: top;
            /* Memastikan item berada di atas */
        }

        .card-body {
            white-space: normal;
            /* Pastikan teks dalam card mengikuti lebar card */
        }

        .horizontal-scroll {
            overflow-x: auto;
            white-space: nowrap;
        }

        .horizontal-scroll .card {
            display: inline-block;
            margin-right: 1rem;
            /* Optional: Adds space between cards */
            margin-top: 2rem;
        }



        @media (max-width: 992px) {
            body {
               
                min-height: 100vh;
            }

            .scroll {
                /* margin: 4px, 4px; */
                padding: 4px;
                width: 100%;
                max-height: 40vh;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: justify;
            }

            .navbar {
                transition: background-color 0.3s, box-shadow 0.3s;
                /* Transisi untuk latar belakang dan bayangan kotak */
            }

            .navbar-transparent {
                background-color: transparent;
                box-shadow: none;
                /* Tanpa bayangan kotak */
            }

            .navbar-white {
                background-color: white !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Bayangan kotak untuk memberikan efek mengapung */
            }

            .text-brand {
                color: #e7008b;
            }

            .card-morp {
                background: rgba(255, 255, 255, 0.25);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                backdrop-filter: blur(4.5px);
                -webkit-backdrop-filter: blur(4.5px);
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.18);
                color: white;
                border: 2px solid white;
            }

            .fp {
                box-shadow: 9px 9px 27px -8px rgba(0, 0, 0, 0.75);
                -webkit-box-shadow: 9px 9px 27px -8px rgba(0, 0, 0, 0.75);
                -moz-box-shadow: 9px 9px 27px -8px rgba(0, 0, 0, 0.75);
                border: 2px solid white;
            }
            ::placeholder {
            color: white; /* Mengubah warna placeholder menjadi putih */
            opacity: 1; /* Menjaga opacity agar tetap penuh */
        }

        }

        .card-morp-2 {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border: 2px solid white;
        }
        .line-morp {
           
            border: 2px solid white;
        }
        .btn-check{
            background-color: red!important;
        }
        .jk{
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 3px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border: 2px solid white;
            padding:2px 10px;
            color: white;
        }
        .jk-checked{
            background: rgba(255, 255, 255);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 3px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border: 2px solid white;
            padding:2px 10px;
            color: #e7008b;
        }
    </style>
    <section>
    <div class="container-fluid fixed-top bg-white" >
        <div class="row px-2">
            <div class="col-12 d-flex justify-content-between py-3">
                <!-- <div class=" text"  onclick="window.history.back()"><i class="fas fa-chevron-left fa-xl"></i></div> -->
                <a href="<?=base_url('dashboard_user')?>" class="text-dark" id="text-name"><i class="fas fa-chevron-left fa-xl"></i></a>
                <span class="mulish-700" >User Profile</span>               
                <span class="" >
                    <a href="#" id="submit-form">
                        <i class="fas fa-check fa-xl color-4"></i>
                    </a>
                </span>               
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4">
        <div class="row py-5 mb-5">
            
            <form action="<?= base_url('profile_user/update') ?>" method="post" enctype="multipart/form-data" id="form-m">
                <input type="hidden" name="prov" id="prov-m" value="<?=$prove?>">
                <input type="hidden" name="kab" id="kab-m" value="<?=$kab?>">
                <input type="hidden" name="kec" id="kec-m" value="<?=$kec?>">
                <input type="hidden" name="des" id="des-m" value="<?=$des?>">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4 text-center">
                           <?php if ($this->session->userdata('foto') != null) { ?>
                                
                                    <img id="blahM" src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>" class="items-center my-auto rounded-circle" alt="..." width="70" height="70">
                                <?php

                            } else { ?>
                               <img id="blahM" src="<?= base_url('assets/admin/img/user.png') ?>" class="items-center my-auto rounded-circle" alt="..." width="70" height="70">

                                <?php

                            }
                            ?>
                                <label for="imgInpM" id="fchange"><i class="fa-solid fa-camera"></i></label>
                                <input type="file" name="file" id="imgInpM" class="d-none" accept="image/*" >
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <span class="mulish-700" >Biodata Pengguna</span>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama" class="text-dark mulish-400 fs-12">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm input-text mulish-400" id="nama" placeholder="Masukkan nama lengkap" value="<?= $nama ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="text-dark mulish-400 fs-12">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control form-control-sm input-text mulish-400" id="tgl_lahir" placeholder="" value="<?= $tgl_lahir ?>">
                            </div>
                            <div class="">                               
                                <label for="nama" class="text-dark mulish-400 fs-12">Jenis Kelamin</label>
                            </div>
                           
                            <div class="mb-3 form-check-inline">
                                <input type="radio" value="1" name="jenis_kelamin" class="form-check-input " id="jk1" <?php if ($jenis_kelamin == 1) {
                                    echo 'checked';
                                } ?>>
                                <label class="form-check-label text-dark" for="jk1" >
                                    Laki-laki
                                </label>
                            </div>
                            <div class="mb-3 form-check-inline">
                                <label class="form-check-label text-dark" for="jk-2">
                                <input type="radio" value="2" name="jenis_kelamin" class="form-check-input " id="jk-2" <?php if ($jenis_kelamin == 2) {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                    Perempuan</label>
                            </div>
                            <div class="mb-3">
                                <label for="hobi" class="text-dark mulish-400 fs-12">Hobi</label>
                                <input type="text" name="hobi" class="form-control form-control-sm input-text mulish-400" id="hobi" placeholder="Hobi" value="<?= $hobi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="text-dark mulish-400 fs-12">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control form-control-sm input-text mulish-400" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsikan diri anda" class="text-dark mulish-400 fs-12">Deskripsikan diri anda</label>
                                <textarea name="deskripsi_diri" id="" class="form-control input-text mulish-400" placeholder="Tuliskan tentang diri anda"><?= $deskripsi_diri ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kriteria" class="text-dark mulish-400 fs-12">Kriteria pasangan</label>
                                <textarea name="kriteria_pasangan" id="" class="form-control input-text mulish-400" placeholder="Tuliskan kriteria pasangan anda"><?= $kriteria_pasangan ?></textarea>
                            </div>
                            <!-- <div class="input-group mb-3">
                                <span class="input-group-text" id="email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control input-text mulish-400" placeholder="Email" aria-label="Email" aria-describedby="email">
                            </div> -->
                           
                        </div>
                        <div class="col-lg-6">
                            <?php if($alamat!=null){?>
                              
                                <div class="alamat">
                                    <div class="mb-3">
                                        <label for="" class="text-dark mulish-400 fs-12">Alamat Saat Ini</label>
                                        <br>
                                        <?=$alamat?>, <?=$des?>, <?=$kec?>, <?=$kab?>, <?=$prove?>
                                    </div>                                               
                                </div>
                                </div>
                                <?php } else { ?>
                                    <div>
                                        <h2>

                                        </h2>
                                        <div>

                                        </div>
                                    </div>
                                <?php } ?>
                            <div class="mb-4">
                                <label class="text-dark mulish-400 fs-12">Alamat<small></small></label>
                                <input type="text" name="alamat" id="alamat-m" class="form-control" placeholder="Alamat" value="<?=$alamat?>">
                            </div>                           
                            <div class="mb-3">
                                <label class="text-dark mulish-400 fs-12">Provinsi<small></small></label>
                                <select name="" class="form-control input-text mulish-400 select-search provinsi" id="provinsi-m">
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
                            <label class="text-dark mulish-400 fs-12">Kabupaten <small></small></label>
                                <select name="" class="form-control input-text mulish-400 select-search kabupaten" id="kabupaten-m">
                                    <option value=''>Kabupaten</option>
                                </select>
                            </div>                                             
                            <div class="mb-3">
                            <label class="text-dark mulish-400 fs-12">Kecamatan<small></small></label>
                                <select name="" class="form-control input-text mulish-400 select-search kecamatan" id="kecamatan-m" >
                                    <option>Kecamatan</option>
                                </select>
                            </div>                                             
                            <div class="mb-3">
                                <label class="text-dark mulish-400 fs-12">Desa <small></small></label>
                                <select name="" class="form-control input-text mulish-400 select-search desa" id="desa-m">
                                    <option>Desa</option>
                                </select>
                            </div>                                            
                           
                            <div class="mb-2">
                                <label for="" class="text-dark mulish-400 fs-12">Kontak</label>
                            </div>                                      
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="phone">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="phone" name="phone" class="form-control input-text mulish-400" placeholder="phone" aria-label="phone" aria-describedby="phone" value="<?= $phone ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="fb">
                                    <i class="fa-brands fa-facebook"></i>
                                </span>
                                <input type="fb" name="fb" class="form-control input-text mulish-400" placeholder="fb" aria-label="fb" aria-describedby="fb" value="<?= $fb ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="ig">
                                    <i class="fa-brands fa-instagram"></i>
                                </span>
                                <input type="ig" name="ig" class="form-control input-text mulish-400" placeholder="ig" aria-label="ig" aria-describedby="ig" value="<?= $ig ?>">
                            </div>
                            <!-- <div class="py-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn bg-1 text-white">Update</button>
                                </div>
                            </div>     		 -->
                        </div>
                    </div>                      
                </div>
            </form>
           
        </div>
    </div>
    </section>

        <script>
            var form = document.getElementById("form-m");

            document.getElementById("submit-form").addEventListener("click", function () {
            form.submit();
            });

             window.addEventListener('scroll', function () {
            var navbar = document.getElementById('navbar');
            var text = document.getElementById('text-name');
            var brand = document.getElementById('brand');
            if (window.scrollY > 0) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-white');
                text.classList.remove('text-white');
                text.classList.add('text-dark');
                brand.classList.remove('text-white');
                brand.classList.add('text-brand');
            } else {
                navbar.classList.remove('navbar-white');
                navbar.classList.add('navbar-transparent');
                text.classList.remove('text-dark');
                text.classList.add('text-white');
                brand.classList.remove('text-brand');
                brand.classList.add('text-white');
            }
        });
        </script>
    

    

</div>