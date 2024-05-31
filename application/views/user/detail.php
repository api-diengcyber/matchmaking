<div class="d-none d-md-none d-sm-none d-lg-block">
    <style>
.bg-1 {
	background-color: #7575fa
  }
    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-all">
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
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white"><?=$users->nama?></h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white"><?php 
                                                if($users->jenis_kelamin==1){ echo 'Laki-laki';}else{ echo 'Perempuan';}?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Tentang</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Tentang <?=$users->nama?></h6>
                                                        <p><?=$users->deskripsi_diri?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p><?=$users->tgl_lahir?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p><?=$users->pekerjaan?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p><?=$users->hobi?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Kriteria </h6>
                                                        <p><?=$users->kriteria_pasangan?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-center">Kontak</h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i> <span></span></h6>
                                                        <p><?=$users->fb?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i> <span></span></h6>
                                                        <p><?=$users->ig?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i> </h6>
                                                        <p><?=$users->alamat?></p>
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
                                                <?php if($requestCek==null){?>
                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Request Matching
                                                    </button>
                                                <?php }else{?>
                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Menunggu Konfirmasi Matching
                                                    </button>
                                                    <?php
                                                     } ?>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Request Matching</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12 py-4">
                                                                    <h5 class="text-center">
                                                                        Yakin coba matching dengan <?=$users->nama?>?
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                                                <h4 class="text-center p-2 rounded-3 bg-success text-white"><?=$users->nama?></h4>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="text-center badge bg-primary text-white"><?php 
                                                if($users->jenis_kelamin==1){ echo 'Laki-laki';}else{ echo 'Perempuan';}?></p>
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
                                                        <h6 class="">Tentang <?=$users->nama?></h6>
                                                        <p style="font-size:12px"><?=$users->deskripsi_diri?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Tanggal Lahir </h6>
                                                        <p style="font-size:12px"><?=$users->tgl_lahir?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Pekerjaan</h6>
                                                        <p style="font-size:12px"><?=$users->pekerjaan?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="">Hobi</h6>
                                                        <p style="font-size:12px"><?=$users->hobi?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class="">Kriteria </h6>
                                                        <p style="font-size:12px"><?=$users->kriteria_pasangan?></p>
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
                                                        <h6 class=""><i class="fa-brands fa-facebook fa-xl"></i> <span></span></h6>
                                                        <p style="font-size:12px"><?=$users->fb?></p>
                                                    </div>
                                                    <div class="col-12 pt-4">                                                        
                                                        <h6 class=""><i class="fa-brands fa-instagram fa-xl"></i> <span></span></h6>
                                                        <p style="font-size:12px"><?=$users->ig?></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class=""><i class="fa-solid fa-location-dot fa-xl"></i> </h6>
                                                        <p style="font-size:12px"><?=$users->alamat?></p>
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
                                                    <button type="button" class="btn bg-1 text-white" data-bs-toggle="modal" data-bs-target="#mm">
                                                    Request Matching
                                                    </button>
                                                </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="mmLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mmLabel">Request Matching</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12 py-4">
                                                                    <h5 class="text-center">
                                                                        Yakin coba matching dengan <?=$users->nama?>?
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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