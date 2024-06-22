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
                                                <form action="<?= base_url('request_user/masuk/all') ?>" method="get" class="row gx-3 gy-2 align-items-center">
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
    width: 100%; /* Lebar kontainer */
    /* height: 300px; Tinggi kontainer */
    overflow-x: auto; /* Aktifkan scroll horizontal */
    overflow-y: none; /* Aktifkan scroll horizontal */
    white-space: nowrap; /* Pastikan konten tidak mematahkan baris */
    /* border: 1px solid #ccc; Garis tepi untuk kontainer */
    padding: 10px; /* Padding untuk kontainer */
}

.scroll-item {
    display: inline-block; /* Membuat item berada dalam satu baris */
    width: 80%; /* Lebar setiap item */
    margin-right: 10px; /* Jarak antar item */
    vertical-align: top; /* Memastikan item berada di atas */
}

.card-body {
    white-space: normal; /* Pastikan teks dalam card mengikuti lebar card */
}

.horizontal-scroll {
        overflow-x: auto;
        white-space: nowrap;
        /* margin: 0px 20px ; */
    }
    .horizontal-scroll .card {
        display: inline-block;
        margin-right: 1rem; /* Optional: Adds space between cards */
        margin-top: 10px;
        margin-bottom: 10px;
        
        
    }

    

@media (max-width: 992px) {
   
   
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
    transition: background-color 0.3s, box-shadow 0.3s; /* Transisi untuk latar belakang dan bayangan kotak */
}

.navbar-transparent {
    background-color: transparent;
    box-shadow: none; /* Tanpa bayangan kotak */
}

.navbar-white {
    background-color: white !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan kotak untuk memberikan efek mengapung */
}
.text-brand{
    color:#e7008b ;
}
.card-morp{
    background: rgba( 255, 255, 255, 0.25 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 4.5px );
    -webkit-backdrop-filter: blur( 4.5px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    color:white;
    border: 2px solid white;
    }
  
  
    .horizontal-scroll::-webkit-scrollbar {
        width: 0;
        height: 0;
        }

    .horizontal-scroll::-webkit-scrollbar-thumb {
        display: none;
        }

    .horizontal-scroll::-webkit-scrollbar-track {
        display: none;
        }

}
.card-morp-2{
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 20px );
    -webkit-backdrop-filter: blur( 20px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    border: 2px solid white;
    }

   

    .user-avatar {
        display: flex;
        align-items: center;
    }

    .user-avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .user-info {
        margin-left: 10px;
    }

    .user-info h5 {
        margin-bottom: 0;
        font-size: 12px;
        font-weight: 600;
    }

    .user-info p {
        margin-bottom: 0;
        font-size: 8px;
        color: #6c757d;
    }

    /* .btn {
        width:67px;
        height:34px;
        padding: 0px 15px;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        font-size: 10px;
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
      
        transition: background-color 0.3s ease;
    } */

    .btn-m{
        font-size: 11px;
        border-radius: 20px;
        padding: 8px 20px;
    }

    .btn-meet {
        margin-right: 5px;
        color: white;
    }

    .btn-meet:hover {
        background-color: #ff4d4d;
    }

    .btn-view {
        background-color: #6C6C6C;
        color: white;
    }

    .btn-view:hover {
        background-color: #6C6C6C;
    }
   

</style>
    <section style="">

    <?php $this->load->view('user/component/headOne');?>

  
        <div class="container-fluid pt-5 mb-4" style="">
            <div class="pt-5"></div>
            <div class="pt-5"></div>
            <div class="pt-3"></div>
            <!-- <a href="<?=base_url('jadwal_user/index/'.$r->idRequest)?>" class="btn btn-sm btn-primary">Lihat <i class="fa-solid fa-angle-right"></i></a> -->
            <div class="row">
                <?php 
                    foreach ($request as $r) { 
                        if($r->status==1){
                            $statusText= '<small class=" text-primary fs-10">Menunggu</small>';
                        }elseif($r->status==2){
                            $statusText= '
                            <small class=" text-primary fs-10">Menunggu room</small>
                            '; }elseif($r->status==3){
                                $statusText= '
                                <small class=" text-danger fs-10">Ditolak</small>
                                ';
                                }elseif($r->status==4){
                                    $statusText ='
                                    <small class=" text-primary fs-10">Jadwal siap</small>
                                    ';
                                    
                            }elseif($r->status==5){
                                $statusText = '<small class=" text-success fs-10 mb-3">Selesai</small>';
                                }elseif($r->status==6){
                                    $statusText= '
                                    <small class=" text-danger fs-10 mb-3">Room ditolak</small>
                                    ';
                                }elseif($r->status==7){
                                    $statusText= '
                                    <small class=" text-danger fs-10 mb-3">Expired</small>
                                    ';
                                }elseif($r->status==8){
                                    $statusText= '
                                        <small class=" text-danger fs-10 mb-3">Canceled</small>
                                    ';
                                    }else{
                                        $statusText= '';
                                    }
                                    ?>
                
                    <div class="col-md-6 mb-4">
                        <div class="card card-users">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between">
                                        <a href="<?= base_url('users_user/detail/' . $r->id_user_1) ?>" class="text-dark text-decoration-none">
                                            <div class="d-flex justify-content-between">
                                                <div class="">
                                                    <?php if ($r->foto == null) { ?>
                                                        <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="" width="50" height="50" class="rounded-circle">
                                                        
                                                    <?php } else { ?>
                                                        <img src="<?= base_url('assets/user/foto/' . $r->foto) ?>" alt="" width="50" height="50" class="rounded-circle">
                                                    <?php } ?>
                                                </div>
                                                <div class="my-auto">
                                                    <div class="user-info">
                                                        <p></p>
                                                        <h5 ><?=$r->nama_user1?></h5>
                                                        <p> <?= date('d-m-Y', strtotime($r->tgl_update))
                                                                ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-flex justify-content-between my-auto">
                                            <?php 
                                            if ($r->status == 1) {
                                            ?>
                                            <a href="#" class="btn btn-m btn-meet bg-3" data-bs-toggle="modal" data-bs-target="#konfirmasi<?=$r->idRequest?>">Konfirmasi</a>
                                            <!-- Modal -->
                                                <div class="modal fade px-5" id="konfirmasi<?=$r->idRequest?>" tabindex="-1" aria-labelledby="konfirmasi<?=$r->idRequest?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                        <div class="modal-content r-20">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <p class="text-center fs-12 mulish-600">
                                                                        Apakah Kamu yakin ingin menerima permintaan pertemuan dengan
                                                                        <span class="color-3">
                                                                            <?=$r->nama_user1?>
                                                                        </span>
                                                                            ?
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-12 p-4 d-flex justify-content-between">
                                                                        <div class="">
                                                                            <a href="<?=base_url('request_user/acc/'.$r->idRequest)?>" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Iya</a>
                                                                        </div>
                                                                        <div class="">
                                                                            <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                data-bs-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Modal Option -->
                                            <a href="#" class="btn btn-m btn-view" data-bs-toggle="modal" data-bs-target="#tolak<?=$r->idRequest?>">Tolak</a>
                                                <!-- Modal -->
                                                <div class="modal fade px-5" id="tolak<?=$r->idRequest?>" tabindex="-1" aria-labelledby="tolak<?=$r->idRequest?>Label" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                            <div class="modal-content r-20">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <p class="text-center fs-12 mulish-600">
                                                                            Apakah Kamu yakin ingin menolak permintaan pertemuan dengan
                                                                            <span class="color-3">
                                                                                <?=$r->nama_user1?>
                                                                            </span>
                                                                                ?
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 p-4 d-flex justify-content-between">
                                                                            <div class="">
                                                                                <a href="<?=base_url('request_user/reject/'.$r->idRequest)?>" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Iya</a>
                                                                            </div>
                                                                            <div class="">
                                                                                <button class="btn bg-4 rounded-pill text-white mulish-700 fs-12 r-10" type="button"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal Option -->
                                                    <?php }elseif($r->status==2){?>
                                                       
                                                        <?=$statusText?>
                                                <?php }elseif($r->status==3){?>
                                                    <?=$statusText?>
                                                <?php }elseif($r->status==4){?>
                                                            <a href="<?=base_url('jadwal_user/index/'.$r->idRequest)?>"  class="btn btn-m btn-meet bg-3">Jadwal</a>
                                                        
                                                        <?php }elseif($r->status==5){?>
                                                            <?=$statusText?>
                                                        <?php }elseif($r->status==6){?>
                                                            <?=$statusText?>
                                                        <?php }elseif($r->status==7){?>
                                                            <?=$statusText?>
                                                        <?php }elseif($r->status==8){?>
                                                            <?=$statusText?>
                                                        <?php }?>
                                        </div>
                                    </div>                                  
                                </div>                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
        
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