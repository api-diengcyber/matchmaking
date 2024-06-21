<div class="d-none d-md-none d-sm-none d-lg-block">


    <style>

    </style>
    <div class="container-fluid overflow-hidden" style="background-color:#e8e8e8">
        <div class="row g-0 vh-100 overflow-y-auto">
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100">
                <main class="row overflow-auto py-4 px-3">


                    <!-- Modal -->
                    <?php if(empty($jk)){?>
                    <div class="modal fade" id="lengkapi-profile" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Selamat datang di Matchmaking 👋, silahkan lengkapi profil anda terlebih dahulu 😀 <span>
                                                <a href="<?=base_url('profile_user')?>">Lengkapi</a>
                                            </span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Dashboard</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-4 pt-3">
                                        <a href="<?= base_url('request_user/masuk') ?>" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-4"><i
                                                            class="fa-solid fa-repeat fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                       <?=$reqMasuk?>
                                                    </h4>
                                                    <h6 class="text-center">Request Masuk</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <a href="<?= base_url('request_user/keluar') ?>" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-4"><i
                                                            class="fa-solid fa-repeat fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                       <?=$reqKeluar?>
                                                    </h4>
                                                    <h6 class="text-center">Request Keluar</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <a href="" class="text-decoration-none text-dark">
                                            <div class="card my-card">
                                                <div class="card-body">
                                                    <h4 class="text-center py-2 color-4"><i
                                                            class="fa-solid fa-user-check fa-xl"></i></h4>
                                                    <h4 class="text-center">
                                                        <?=$meet?>
                                                    </h4>
                                                    <h6 class="text-center">Meet Selesai</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 pt-3 bg-light">
                                <div class="row">
                                    <div class="col-12 px-3 d-flex justify-content-between shadow-sm">
                                    <h5>Request Masuk</h5>
                                                <a href="<?=base_url('request_user/masuk')?>">Lihat Semua</a>
                                    </div>
                                    <div class="col-12 scroll bg-light px-3">
                                        
                                        <?php
                                        foreach ($newReqMasuk as $m) {
                                            ?>
                                            <div class="card mb-3 card-notif">
                                                <div class="row">
                                                    <div class="col-md-4 d-flex justify-content-center p-2 ">
                                                        <img src="<?= base_url('assets/admin/img/user.png') ?>"
                                                            class="items-center my-auto" alt="..." width="50" height="50">
                                                    </div>
                                                    <div class="col-md-8 p-2">
                                                        <a href="<?=base_url('users_user/detail/'.$m->id_user)?>" class="text-decoration-none">
                                                            <b><?=$m->nama?></b>
                                                        </a>
                                                        <br>
                                                        <small class="text-muted"><?= diffForHumans($m->tgl_update) ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                      

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <div class="col"> Footer content here... </div>
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
            margin-bottom: 5px;
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

<section>
     <!-- Modal -->
     <?php if(empty($jk)){?>
                    <div class="modal fade" id="lengkapi-profile-m" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content px-5">
                               
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 mulish-700 text-center">
                                            <p>Selamat datang di N3MU 👋, silahkan lengkapi profil kamu terlebih dahulu 😀 <span>
                                                <br>
                                                <a href="<?=base_url('profile_user')?>" class="btn bg-3 rounded-pill text-white mulish-700 fs-12 r-10">Lengkapi</a>
                                            </span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
    <?php $this->load->view('user/component/headOne');?>

<div class="container-fluid mb-4">
    <div class="pt-5"></div>
    <div class="pt-5"></div>
    <div class="pt-5"></div>
    <div class="row">
        <div class="horizontal-scroll">
            <div class="card card-beranda" style="width:43%">
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center pt-1 color-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </p>
                        <h5 class="text-center mulish-400" style="margin-top:-10px">
                            <b>
                            <?=$meet?>                               
                            </b>
                        </h5 >
                        <p class="text-center mulish-400" style="margin-top:-10px">
                            Matching
                        </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card  card-beranda" style="width:43%">
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center pt-1 color-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                        </p>
                        <h5 class="text-center mulish-400" style="margin-top:-10px">
                            <b>
                            <?=$meet?>
                            </b>
                        </h5 >
                        <p class="text-center mulish-400" style="margin-top:-10px">
                            Meet
                        </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card  card-beranda" style="width:43%">
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center pt-1 color-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        </p>
                        <h5 class="text-center mulish-400" style="margin-top:-10px">
                            <b>
                            <?=$reqMasuk+$reqKeluar?>   
                            </b>
                        </h5 >
                        <p class="text-center mulish-400" style="margin-top:-10px">
                            Request
                        </p>
                    </div>
                </div>
                </div>
            </div>
            
        
            <!-- Tambahkan lebih banyak card sesuai kebutuhan -->
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-3">
            <h5 class="mulish-700">Saran Pengguna</h5>
        </div>
    </div>
    <div class="row">
    <?php 
        foreach ($newUser as $nu) { 
    ?> 
        <div class="col-md-6 mb-4">
            <div class="card card-beranda">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <?php if ($nu->foto == null) { ?>
                                        <img src="<?= base_url('assets/admin/img/user.png') ?>" alt="" width="50" height="50" class="rounded-circle">
                                        
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/user/foto/' . $nu->foto) ?>" alt="" width="50" height="50" class="rounded-circle">
                                    <?php } ?>
                                </div>
                                <div class="my-auto">
                                    <div class="user-info">
                                        <h5><?=$nu->nama?></h5>
                                        <p>Request Match Baru</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between my-auto">
                                <a href="<?= base_url('users_user/detail/' . $nu->id_user) ?>" class="btn btn-m btn-meet bg-3">Meet</a>
                                <a href="<?= base_url('users_user/detail/' . $nu->id_user) ?>" class="btn btn-m btn-view">View</a>
                            </div>
                        </div>                                  
                    </div>                                
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
       
       
</div>

</section>
</div>