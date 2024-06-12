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
                                                <form action="<?= base_url('request_user/masuk') ?>" method="post" class="row gx-3 gy-2 align-items-center">
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
                                                            </div>
                                                            <div class="">
                                                                
                                                            <?php
                                                           if ($r->status == 1) {
                                                            ?>
                                                            <div class="">
                                                                <span class="badge bg-primary rounded-pill">Menunggu diterima oleh Anda</span>
                                                                <p class="text-end pt-2">
                                                                    <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#accModal<?=$r->idRequest?>">
                                                                        Terima
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


                                                                </p>

                                                            </div>
                                                            <br>
                                                        <?php }elseif($r->status==2){?>
                                                            <span class="badge bg-primary rounded-pill">Diterima, Menunggu room dari admin</span>
                                                            
                                                        <?php }elseif($r->status==4){?>
                                                                <div class="">
                                                                    <span class="badge bg-primary rounded-pill">Jadwal meet anda sudah siap</span>
                                                                    <p class="text-end pt-4">
                                                                        <a href="<?=base_url('jadwal_user/index/'.$r->idRequest)?>" class="text-decoration-none">Lihat <i class="fa-solid fa-angle-right"></i></a>
                                                                    </p>
                                                                </div>
                                                                <?php }elseif($r->status==5){?>
                                                                    <span class="badge bg-success rounded-pill">Selesai</span>
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
    <div class="container">
        <section class="fixed-top ">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between py-3 bg-white content-items-center">
                        <a href="<?= base_url('users_user/semua') ?>" class="text-decoration-none pt-2">
                            <i class="fa-solid fa-chevron-left"></i>

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
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <?php if ($users->foto == null) { ?>
                                                    <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                        class="rounded-3" width="140" height="140">
                                                <?php } else { ?>
                                                    <img src="<?= base_url('assets/user/foto/' . $users->foto) ?>" alt=""
                                                        class="rounded-3" width="140" height="140">
                                                <?php } ?>
                                            </div>
                                            <div class="col-12 pt-3 d-flex justify-content-center">
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white">
                                                    <?= $users->nama ?>
                                                </h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white">
                                                    <?php
                                                    if ($users->jenis_kelamin == 1) {
                                                        echo 'Laki-laki';
                                                    } else {
                                                        echo 'Perempuan';
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="text-center">Tentang</h6>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Tentang <?= $users->nama ?></h6>
                                                        <p style="font-size:12px"><?= $users->deskripsi_diri ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p style="font-size:12px"><?= $users->tgl_lahir ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p style="font-size:12px"><?= $users->pekerjaan ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p style="font-size:12px"><?= $users->hobi ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class="">Kriteria </h6>
                                                        <p style="font-size:12px"><?= $users->kriteria_pasangan ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Kontak</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i>
                                                            <span></span>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->fb ?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i>
                                                            <span></span>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->ig ?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i>
                                                        </h6>
                                                        <p style="font-size:12px"><?= $users->alamat ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <!-- Button trigger modal -->
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn bg-1 text-white"
                                                        data-bs-toggle="modal" data-bs-target="#mm">
                                                        Request Matching
                                                    </button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="mmLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="mmLabel">Request Matching
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 py-4">
                                                                        <h5 class="text-center">
                                                                            Yakin coba matching dengan
                                                                            <?= $users->nama ?>?
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="" class="btn btn-primary">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</div>