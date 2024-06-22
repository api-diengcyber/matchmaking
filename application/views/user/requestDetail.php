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
            <div class="col offset-lg-2 offset-xl-2 d-flex flex-column vh-100 ">
                <main class="row overflow-auto py-4 px-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Request Berhasil!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card p-2 card-all">
                                    <div class="row">
                                        <div class="col-4">

                                        <?php
                                        if ($foto_user1 == null) { ?>
                                                        <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" alt="" class="rounded-2" width="150px" height="150px">
                                        <?php } else { ?>
                                                        <img src="<?= base_url('assets/user/foto/' . $foto_user1) ?>" alt="" class="rounded-2" width="150px" height="150px">
                                        <?php }   ?>
                                        </div>
                                        <div class="col-8 d-flex">
                                            <div class="my-auto">
                                                <h4 class="">
                                                    <?= $nama_user1 ?>
                                                </h4>
                                                <p class="">
                                                    <?php
                                                    if ($jenis_kelamin_user1 == 1) {
                                                        echo 'Pria';
                                                    } else {
                                                        echo 'Wanita';
                                                    }
                                                    ?>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-12 p-4">
                                            <b>Info</b>
                                            <table class="table">
                                                <tr>
                                                    <td>Tgl Lahir</td>
                                                    <td><?= date('d-m-Y', strtotime($tgl_lahir_user1)) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><?= $kabupaten_user1.', '.$provinsi_user1 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Hobi</td>
                                                    <td><?= $hobi_user1 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan</td>
                                                    <td><?= $pekerjaan_user1 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Profil</td>
                                                    <td><?= $deskripsi_diri_user1 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kriteria</td>
                                                    <td><?= $kriteria_pasangan_user1 ?></td>
                                                </tr>
                                                <tr>
                                              
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-2 card-all">
                                    <div class="row">
                                        <div class="col-4">
                                            <?php 
                                        if ($foto_user2 == null) { ?>
                                                        <img src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" alt="" class="rounded-2" width="150px" height="150px">
                                        <?php } else { ?>
                                                        <img src="<?= base_url('assets/user/foto/' . $foto_user2) ?>" alt="" class="rounded-2" width="150px" height="150px">
                                        <?php }   ?>

                                        </div>
                                        <div class="col-8 d-flex">
                                            <div class="my-auto">
                                                <h4 class="">
                                                    <?= $nama_user2 ?>
                                                </h4>
                                                <p class="">
                                                    <?php
                                                    if ($jenis_kelamin_user2 == 1) {
                                                        echo 'Pria';
                                                    } else {
                                                        echo 'Wanita';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 p-4">
                                            <b>Info</b>
                                            <table class="table">
                                                
                                                <tr>
                                                    <td>Tgl Lahir</td>
                                                    <td><?= date('d-m-Y', strtotime($tgl_lahir_user2)) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><?= $kabupaten_user2.', '.$provinsi_user2 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Hobi</td>
                                                    <td><?= $hobi_user2 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan</td>
                                                    <td><?= $pekerjaan_user2 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Profil</td>
                                                    <td><?= $deskripsi_diri_user2 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kriteria</td>
                                                    <td><?= $kriteria_pasangan_user2 ?></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="col-12 py-2">
                        <div class="d-grid gap-2">
                        <a href="<?=base_url('dashboard_user')?>" class="btn btn-primary" >BERANDA</a>
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
            /* margin: 0px 20px ; */
        }

        .horizontal-scroll .card {
            display: inline-block;
            margin-right: 1rem;
            /* Optional: Adds space between cards */
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

            .card-profil {

                width: 100%;
                height: 25vh;
                border-radius: 10px;
                margin: 20px;
                border:none;
                position: relative;
                box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-webkit-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-moz-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
            }
            .card-profil-2 {

                width: 100%;
                height:20vh;
                border-radius: 30px;
                /* border:none; */
                position: relative;
                box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-webkit-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
-moz-box-shadow: 2px 3px 10px -1px rgba(115,115,115,0.89);
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

        .btn-m {
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
    <img src="<?= base_url('assets/temuser/heartline.svg') ?>" alt="" class="heart-line" style="margin-top:50%;z-index:-1">
        <div class="container-fluid fixed-top bg-white " id="navbar">
            <div class="row px-2">
                <div class="col-12 d-flex justify-content-between py-3">
                    <div class="text" id="text-name" onclick="window.history.back()"><i
                            class="fa-solid fa-arrow-left fa-xl"></i>
                    </div>
                    <div class="">
                        <p class="mulish-700">Pengajuan Pertemuan</p>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        </div>
        <div class="container pt-5 mb-4 " >
           <div class="row pt-2 mb-4">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <?php if ($foto_user1 == null) { ?>
                                <div class="card card-profil" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.1)),
                                url('https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg');background-size:cover;background-position: center;
                                background-repeat: no-repeat;">
                                    <?php
                                } else { ?>
                                        <div class="card card-profil"
                                            style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)),
                                            url('<?= base_url('assets/user/foto/' . $foto_user1) ?>');background-size:cover;background-position: center; background-repeat: no-repeat;">
                                            <?php
                                } ?>
                                    
                            
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <?php if ($foto_user2 == null) { ?>
                                <div class="card card-profil" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.1)),
                                    url('https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg');background-size:cover;background-position: center;
                                    background-repeat: no-repeat;">
                                        <?php
                                    } else { ?>
                                            <div class="card card-profil"
                                                style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)),
                                                url('<?= base_url('assets/user/foto/' . $foto_user2) ?>');background-size:cover;background-position: center; background-repeat: no-repeat;">
                                                <?php
                                    } ?>
                                </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                        <img src="<?= base_url('assets/temuser/match3.svg') ?>" alt="" class="img-match-3">
                        </div>
                       
                    </div>
                    <div class="row position-relative" style="top:2%">
                        <div class="col-12 text-center mulish-700 fs-12">
                            <p>
                            Pengajuan sukses, tunggu Admin mengkonfirmasi pertemuan dengan orang yang Kamu inginkan! Jangan lupa cek notifikasi untuk informasi terbaru terkait pertemuanmu!
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                            <a href="<?=base_url('dashboard_user')?>" class="btn bg-3 text-white mulish-700">Kembali ke Beranda</a>
                            </div>
                        </div>

                    </div>
                </div>
           </div>
            
    </section>
    <script>
         $(".btn-profil-m").click(function () {
            $(".profile-detail").toggleClass("d-none");
            $(".profile-front").toggleClass("d-none");
        // $('.btn-batal-ubah').addClass('d-none');
        // $('.btn-ubah').removeClass('d-none');
        // $('.alamat').removeClass('d-none');
        // $('.input-alamat').addClass('d-none');
        // alert('sada');
    });
    </script>

</div >