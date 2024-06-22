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
                        
                       
                    </div>
                    <div class="col-12">
                        <div class="card card-all">
                            <div class="card-body">
                            <form action="<?= base_url('users_user/semua') ?>" method="get">                        
                                <div class="row ">
                                        <div class="col-8 ">
                                            <div class="mb-3 my-auto px-2">
                                                <input type="text" name="cari" class="form-control " style="border-right:none" placeholder="Cari.."
                                                    onchange="this.form.submit();" value="<?= $cari ?>">
                                                                                                        
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-2">
                                                <select name="sort" id="" class="form-select " style="border-left:none;" onchange="this.form.submit();">
                                                        <option value="asc" <?php if($sort=='asc'){echo "selected";}?>>A-Z</option>
                                                        <option value="desc" <?php if($sort=='desc'){echo "selected";}?>>Z-A</option>
                                                    </select> 
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php foreach ($users as $u) { ?>
                                <div class="col-4 pt-3">
                                    <a href="<?= base_url('users_user/detail/' . $u->id_user) ?>"
                                        class="text-decoration-none text-dark ">
                                        <div class="card card-all card-users">
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
                                                            <?php 
                                                            substr($u->deskripsi_diri, 0, 25) . '..';
                                                            echo $u->kabupaten.', '.$u->provinsi;
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

                            <div class="col-12">
                                <?= $pagination; ?>
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
                <div class="col-12 d-flex justify-content-between py-3 ">
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
            <form action="<?= base_url('users_user/semua') ?>" method="get">                        
                <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <input type="text" name="cari" class="form-control " style="border-right:none" placeholder="Cari.."
                                    onchange="this.form.submit();" value="<?= $cari ?>">
                                                                                          
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <select name="sort" id="" class="form-select " style="border-left:none;" onchange="this.form.submit();">
                                        <option value="asc" <?php if($sort=='asc'){echo "selected";}?>>A-Z</option>
                                        <option value="desc" <?php if($sort=='desc'){echo "selected";}?>>Z-A</option>
                                    </select> 
                            </div>
    
                        </div>
                        <hr>
                    </div>
                </form>
        </div>
        <div class="container-fluid">
            <div class="row mb-2 pt-2">
                <div class="col-12">
                    <?php
                    foreach ($users as $u) {
                        ?>
                        <div class="card card-morp bg-transparent mb-4" style="width: 100%;border:2px solid white">
                        <a href="<?= base_url('users_user/detail/' . $u->id_user) ?>" class="text-decoration-none text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <?php if ($u->foto == null) { ?>
                                            <img src="<?= base_url('assets/admin/img/user.png') ?>" alt=""
                                                class="rounded-circle fp" width="60" height="60">
                                        <?php } else { ?>
                                            <img src="<?= base_url('assets/user/foto/' . $u->foto) ?>" alt=""
                                                class="rounded-circle fp" width="60" height="60">
                                        <?php } ?>
                                    </div>
                                    <div class="col-9">
                                        <h6>
                                            <?= $u->nama ?>
                                        </h6>
                                        <p style="font-size: 12px;">
                                            <?= substr($u->deskripsi_diri, 0, 50) . '..'; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <?= $pagination; ?>
                </div>
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