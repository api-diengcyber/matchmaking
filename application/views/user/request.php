<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
        .bg-1 {
            background-color: #7575fa
        }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="success" id="success"
            success="<?php echo $this->session->userdata('success') <> '' ? $this->session->userdata('success') : ''; ?>">
        </div>
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <h5>Request Masuk</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-all">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="<?= base_url('request_user/masuk') ?>" method="get" class="row gx-3 gy-2 align-items-center">
                                                    <div class="col-sm-3">
                                                        <input type="text" name="cari" class="form-control"
                                                            placeholder="Cari nama.." onchange="this.form.submit();"
                                                            value="<?= $cari ?>">
                                                           
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select name="sort" id="" class="form-select" onchange="this.form.submit();">
                                                            <option value="asc" <?php if($sort=='asc'){echo "selected";}?>>A-Z</option>
                                                            <option value="desc" <?php if($sort=='desc'){echo "selected";}?>>Z-A</option>
                                                        </select>                                                        
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select name="status" id="" class="form-select" onchange="this.form.submit();">
                                                            <option value="" <?php if($status==''){echo "selected";}?>>Semua</option>
                                                            <option value="1" <?php if($status=='1'){echo "selected";}?>>Menunggu Konfirmasi Teman</option>
                                                            <option value="8" <?php if($status=='8'){echo "selected";}?>>Dibatalkan</option>
                                                            <option value="2" <?php if($status=='2'){echo "selected";}?>>Diterima, Menuggu Room</option>
                                                            <option value="3" <?php if($status=='3'){echo "selected";}?>>Ditolak</option>
                                                            <option value="4" <?php if($status=='4'){echo "selected";}?>>Room Aktif</option>
                                                            <option value="5" <?php if($status=='5'){echo "selected";}?>>Room Selesai</option>
                                                            <option value="6" <?php if($status=='6'){echo "selected";}?>>Room Ditolak</option>
                                                            <option value="7" <?php if($status=='7'){echo "selected";}?>>Expired</option>
                                                        </select>                                                     
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-12 pt-3">
                                            <?php
                                                $no=1;
                                                foreach ($request as $r) { ?>
                                                <div class="card rounded-0 mb-2">
                                                    <div class="card-body">
                                                       <div class="col-12 d-flex justify-content-between">
                                                            <div class="">
                                                                <a href="<?=base_url('users_user/detail/'.$r->id_user_1)?>" class="text-decoration-none text-dark">
                                                                    <div class="fw-bold">
                                                                            <?= $r->nama_user1 ?>
                                                                    </div>
                                                                    </a>
                                                                    <?= date('d-m-Y', strtotime($r->tgl_update))
                                                                        ?>

                                                                        <?=$r->status?>
                                                            </div>
                                                            <div class="">
                                                                
                                                            <?php
                                                           if ($r->status == 1) {
                                                            ?>
                                                            <div class="">
                                                                <span class="badge bg-primary rounded-pill">Menunggu diterima oleh Anda</span>
                                                                    <div class="text-end pt-2">
                                                                        <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#accModal<?=$r->idRequest?>">
                                                                            Terima <i class="fa-solid fa-check"></i>
                                                                            </button>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="accModal<?=$r->idRequest?>" tabindex="-1" aria-labelledby="accModal<?=$r->idRequest?>Label" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="accModal<?=$r->idRequest?>Label">Terima Request</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h4 class="text-center">
                                                                                        Yakin terima request dari <?=$r->nama_user1?>
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <a href="<?=base_url('request_user/acc/'.$r->idRequest)?>" class="btn btn-primary">Ya</a>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>

                                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolak">
                                                                            Tolak Request <i class="fa-solid fa-circle-xmark"></i>
                                                                            </button>
                                                                            <!-- MOdal tolak -->
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="tolakLabel">Tolak Request</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            Yakin Tolak Request Dari <?=$r->nama_user1?>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <a href="<?=base_url('request_user/reject/'.$r->idRequest)?>" class="btn btn-primary">Ya</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                            </div>

                                                            </div>
                                                            <br>
                                                        <?php }elseif($r->status==2){?>
                                                            <span class="badge bg-primary rounded-pill">Diterima, Menunggu room dari admin</span>
                                                            
                                                        <?php }elseif($r->status==3){?>
                                                            <span class="badge bg-danger rounded-pill">Anda Tolak</span>
                                                            
                                                        <?php }elseif($r->status==4){?>
                                                                <div class="">
                                                                    <span class="badge bg-primary rounded-pill">Jadwal meet anda sudah siap</span>
                                                                    <p class="text-end pt-4">
                                                                        <a href="<?=base_url('jadwal_user/index/'.$r->idRequest)?>" class="btn btn-sm btn-primary">Lihat <i class="fa-solid fa-angle-right"></i></a>
                                                                    </p>
                                                                </div>
                                                                <?php }elseif($r->status==5){?>
                                                                    <span class="badge bg-success rounded-pill mb-3">Request Selesai</span>
                                                                <?php }elseif($r->status==6){?>
                                                                    <span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh admin</span>
                                                                <?php }elseif($r->status==7){?>
                                                                    <span class="badge bg-danger rounded-pill mb-3">Request Expired</span>
                                                                <?php }elseif($r->status==8){?>
                                                                    <span class="badge bg-danger rounded-pill mb-3">Request Canceled</span>
                                                                <?php }?>

                                                            </div>

                                                       </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
                background-image: url('<?= base_url('assets/bg.svg'); ?>');
                background-repeat: no-repeat;
                background-size: cover;
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
    </style>

    <section style="">
        <div class="container-fluid fixed-top navbar-transparent" id="navbar">
            <div class="row">
                <div class="col-12 d-flex justify-content-between py-3 text-">
                    <a href="<?= base_url('profile_user') ?>" class="text-decoration-none">
                        <div class="">
                            <?php if ($this->session->userdata('foto') == null) { ?>
                                <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="hugenerd" width="40"
                                    height="40" class="rounded-3">
                            <?php } else { ?>
                                <img src="<?= base_url('assets/user/foto/' . $this->session->userdata('foto')) ?>"
                                    alt="hugenerd" width="40" height="40" class="rounded-3">

                            <?php } ?>

                            <span class="text-white text" id="text-name">
                                <?= $this->session->userdata('nama') ?>
                            </span>
                            <br>
                        </div>

                    </a>
                    <div class="pt-2">
                        <!-- <h4 class="text-white text" id="brand">N3MU</h4> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5 sticky-top" style="background-color:#E7008B">
            <div class="pt-5"></div>
           
            <div class="col-lg-12">
                <form action="<?= base_url('request_user/request_masuk') ?>" method="get" class="row gx-3 gy-2 align-items-center">
                    <div class="col-12">
                        <nav class="nav nav-pills nav-justified" style="width:100%">                        
                            <label for="type" class="px-3" style="width:50%">
                                <input type="radio" name="type" id="type" value="1" class="d-none form-control" onchange="this.form.submit();">
                                <span class="nav-link text-white active text-center">Masuk</span>
                            </label>
                            <label for="type" class="px-3" style="width:50%">
                                <input type="radio" name="type" id="type" value="2" class="d-none form-control" onchange="this.form.submit();">
                                <span class="nav-link text-white active text-center">Keluar</span>
                            </label>                        
                        </nav>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="cari" class="form-control"
                            placeholder="Cari nama.." onchange="this.form.submit();"
                            value="<?= $cari ?>">
                           
                    </div>
                    <div class="col-sm-3">
                        <select name="sort" id="" class="form-select" onchange="this.form.submit();">
                            <option value="asc" <?php if($sort=='asc'){echo "selected";}?>>A-Z</option>
                            <option value="desc" <?php if($sort=='desc'){echo "selected";}?>>Z-A</option>
                        </select>                                                        
                    </div>
                    <div class="col-sm-3">
                        <select name="status" id="" class="form-select" onchange="this.form.submit();">
                            <option value="" <?php if($status==''){echo "selected";}?>>Semua</option>
                            <option value="1" <?php if($status=='1'){echo "selected";}?>>Menunggu Konfirmasi Teman</option>
                            <option value="8" <?php if($status=='8'){echo "selected";}?>>Dibatalkan</option>
                            <option value="2" <?php if($status=='2'){echo "selected";}?>>Diterima, Menuggu Room</option>
                            <option value="3" <?php if($status=='3'){echo "selected";}?>>Ditolak</option>
                            <option value="4" <?php if($status=='4'){echo "selected";}?>>Room Aktif</option>
                            <option value="5" <?php if($status=='5'){echo "selected";}?>>Room Selesai</option>
                            <option value="6" <?php if($status=='6'){echo "selected";}?>>Room Ditolak</option>
                            <option value="7" <?php if($status=='7'){echo "selected";}?>>Expired</option>
                        </select>                                                     
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2 pt-2">
                <div class="col-lg-12 pt-3">
                    <?php
                        $no=1;
                        foreach ($request as $r) { ?>
                        <div class="card rounded-0 mb-2">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-12">
                                        <a href="<?=base_url('users_user/detail/'.$r->id_user_1)?>" class="text-decoration-none text-dark">
                                            <div class="fw-bold">
                                                    <?= $r->nama_user1 ?>
                                            </div>
                                            </a>
                                            <?= date('d-m-Y', strtotime($r->tgl_update))
                                                ?>

                                                <?=$r->status?>
                                    </div>
                                    <div class="col-12">
                                        
                                    <?php
                                if ($r->status == 1) {
                                    ?>
                                    <div class="col-12">
                                        <span class="badge bg-primary rounded-pill">Menunggu diterima oleh Anda</span>
                                            <div class="text-end pt-2">
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#accModal<?=$r->idRequest?>">
                                                    Terima <i class="fa-solid fa-check"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="accModal<?=$r->idRequest?>" tabindex="-1" aria-labelledby="accModal<?=$r->idRequest?>Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="accModal<?=$r->idRequest?>Label">Terima Request</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="text-center">
                                                                Yakin terima request dari <?=$r->nama_user1?>
                                                            </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="<?=base_url('request_user/acc/'.$r->idRequest)?>" class="btn btn-primary">Ya</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolak">
                                                    Tolak Request <i class="fa-solid fa-circle-xmark"></i>
                                                    </button>
                                                    <!-- MOdal tolak -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="tolakLabel">Tolak Request</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Yakin Tolak Request Dari <?=$r->nama_user1?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="<?=base_url('request_user/reject/'.$r->idRequest)?>" class="btn btn-primary">Ya</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                    </div>

                                    </div>
                                    <br>
                                <?php }elseif($r->status==2){?>
                                    <span class="badge bg-primary rounded-pill">Diterima, Menunggu room dari admin</span>
                                    
                                <?php }elseif($r->status==3){?>
                                    <span class="badge bg-danger rounded-pill">Anda Tolak</span>
                                    
                                <?php }elseif($r->status==4){?>
                                        <div class="">
                                            <span class="badge bg-primary rounded-pill">Jadwal meet anda sudah siap</span>
                                            <p class="text-end pt-4">
                                                <a href="<?=base_url('jadwal_user/index/'.$r->idRequest)?>" class="btn btn-sm btn-primary">Lihat <i class="fa-solid fa-angle-right"></i></a>
                                            </p>
                                        </div>
                                        <?php }elseif($r->status==5){?>
                                            <span class="badge bg-success rounded-pill mb-3">Request Selesai</span>
                                        <?php }elseif($r->status==6){?>
                                            <span class="badge bg-danger rounded-pill mb-3">Request ditolak oleh admin</span>
                                        <?php }elseif($r->status==7){?>
                                            <span class="badge bg-danger rounded-pill mb-3">Request Expired</span>
                                        <?php }elseif($r->status==8){?>
                                            <span class="badge bg-danger rounded-pill mb-3">Request Canceled</span>
                                        <?php }?>

                                    </div>

                            </div>
                            </div>
                        </div>
                        <?php } ?>

                        
                    </div>
            </div>
            <div class="row mb-5">
                
            </div>
        </div>
    </section>
    <script>
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